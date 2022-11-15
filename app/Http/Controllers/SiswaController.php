<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $messages = [
        'required' => ':attribute wajib diisi ya cuy!',
        'email' => ':attribute harus diisi alamat email yang valid ya cuy!',
        'max' => ':attribute maksimal :max karakter',
        'min' => ':attribute minimal :min karakter',
        'numeric' => ':attribute harus diisi angka cuy!',
        'unique' => ':attribute tersebut sudah terdaftar cuy!',
        'image' => ':attribute harus berupa gambar cuyy!',
        'mimes' => 'file :attribute harus bertipe jpg,jpeg,png,svg cuyy!',
        'digits' => ':attribute harus diisi 10 digit cuy!',
    ];

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $siswas = Siswa::with('projeks', 'kontaks')->get();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Daftar Data Siswa',
        //     'data' => $siswas
        // ], 200);
        return view('admin.mastersiswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mastersiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $validatedData = $request->validate([
            'nisn' => 'required|numeric|unique:siswas|digits:10',
            'nama' => 'required|min:5|max:55',
            'alamat' => 'required|min:5|max:255',
            'jenis_kelamin' => 'required',
            'email' => 'required|email:dns|unique:siswas',
            'foto' => 'image|file|mimes:jpeg,png,jpg,svg|max:2048',
            'about' => 'required|min:50|max:255',
        ], $this->messages);


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'mastersiswa/' . $foto;

            $dir = public_path('images/admin/mastersiswa');
            if (!file_exists($dir)) mkdir($dir);

            $file->move($dir, $foto);
        } else {
            $save_db_foto = 'default.jpg';
        }

        $validatedData['foto'] = $save_db_foto;

        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', '<strong>Horee</strong> , Data Siswa berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $siswa = $siswa->load('projeks', 'kontaks');
        $links = self::getLinks();
        // return response()->json($siswa);
        return view('admin.mastersiswa.show', compact('siswa', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.mastersiswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $rules = [
            'nama' => 'required|min:5|max:55',
            'alamat' => 'required|min:5|max:255',
            'jenis_kelamin' => 'required',
            'foto' => 'image|file|mimes:jpeg,png,jpg,svg|max:2048',
            'about' => 'required|min:50|max:255',
        ];

        if ($request->nisn != $siswa->nisn) $rules['nisn'] = 'required|numeric|unique:siswas|digits:10';
        if ($request->email != $siswa->email) $rules['email'] = 'required|email:dns|unique:siswas';

        $validatedData = $request->validate($rules, $this->messages);

        if ($request->file('foto')) {
            if ($siswa->foto != 'default.jpg') {
                $old_foto = public_path('images/admin/' . $siswa->foto);
                if (file_exists($old_foto)) unlink($old_foto);
            }

            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'mastersiswa/' . $foto;

            $dir = public_path('images/admin/mastersiswa');
            $file->move($dir, $foto);

            $validatedData['foto'] = $save_db_foto;
        }

        $siswa->update($validatedData);

        $route = ($request->page == "index") ? redirect()->route('siswa.index') : redirect()->route('siswa.show', $siswa->id);

        return $route->with('success', '<strong>Horee</strong> , Data Siswa berhasil diedit!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $projeks = $siswa->projeks;
        if ($projeks->count() > 0) {
            foreach ($projeks as $projek) {
                if ($projek->foto != 'photo.jpg') {
                    $old_foto = public_path('images/admin/' . $projek->foto);
                    if (file_exists($old_foto)) unlink($old_foto);
                };
            }
        }

        if ($siswa->foto != 'default.jpg') {
            $old_foto = public_path('images/admin/' . $siswa->foto);
            if (file_exists($old_foto)) unlink($old_foto);
        };
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', '<strong>Horee</strong> , Data Siswa berhasil dihapus!!');
    }

    public function projeks(Siswa $siswa)
    {
        $projeks = $siswa->projeks;
        return response()->json($projeks);
    }
}
