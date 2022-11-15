<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $messages = [
        'required' => ':attribute wajib diisi ya cuy!',
        'max' => ':attribute maksimal :max karakter',
        'min' => ':attribute minimal :min karakter',
        'image' => ':attribute harus berupa gambar cuyy!',
        'mimes' => 'file :attribute harus bertipe :mimes cuyy!',
        'url' => ':attribute harus berupa link/url yang valid cuyy!',
    ];

    private $jenis_projek = [
        'UI Design',
        'Web Statis',
        'Web Dinamis',
        'Mobile App',
        'Desktop App',
    ];

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $siswas = Siswa::latest()->paginate(4);
        return view('admin.masterproject.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner_id = request()->query('siswa');
        $siswa = Siswa::find($owner_id);
        $jenis_projek = $this->jenis_projek;
        return view('admin.masterproject.create', compact('siswa', 'jenis_projek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_siswa' => 'required',
            'foto' => 'image|file|mimes:jpeg,png,jpg,svg|max:2048',
            'nama' => 'required|min:5|max:55',
            'jenis' => 'required',
            'deskripsi' => 'required|min:25|max:255',
        ];

        if ($request->link) $rules['link'] = 'url';

        $validatedData = $request->validate($rules, $this->messages);

        $validatedData['siswa_id'] = $request->siswa_id;
        $validatedData['link'] = ($link = $request->link) ? $link : "";
        $validatedData['tanggal'] = Carbon::now()->format('Y-m-d');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'masterproject/' . $foto;

            $dir = public_path('images/admin/masterproject');
            if (!file_exists($dir)) mkdir($dir);

            $file->move($dir, $foto);
        } else {
            $save_db_foto = 'photo.jpg';
        }

        $validatedData['foto'] = $save_db_foto;
        Projek::create($validatedData);
        return redirect()->route('projek.index')->with('success', 'Project baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeks = Projek::where('siswa_id', $id)->latest()->get();
        // return response()->json($projeks);
        foreach ($projeks as $value) {
            $value['tanggal'] = Carbon::parse($value['tanggal'])->format('d M Y');
        }
        return view('admin.masterproject.show', compact('projeks', 'id'));
    }

    public function show_detail(Projek $projek)
    {
        return response()->json($projek);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projek $projek)
    {
        $projek = $projek->load('siswa');
        $jenis_projek = $this->jenis_projek;
        return view('admin.masterproject.edit', compact('projek', 'jenis_projek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projek $projek)
    {
        // dd($request->all());
        $rules = [
            'nama_siswa' => 'required',
            'foto' => 'image|file|mimes:jpeg,png,jpg,svg|max:2048',
            'nama_projek' => 'required|min:5|max:55',
            'jenis_projek' => 'required',
            'deskripsi' => 'required|min:25|max:255',
        ];

        if ($request->link) $rules['link'] = 'url';

        $request->validate($rules, $this->messages);

        $data['siswa_id'] = $request->siswa_id;
        $data['nama'] = $request->nama_projek;
        $data['jenis'] = $request->jenis_projek;
        $data['link'] = ($link = $request->link) ? $link : "";
        $data['deskripsi'] = $request->deskripsi;
        $data['tanggal'] = Carbon::now()->format('Y-m-d');

        $newFoto = $request->file('foto');
        if ($newFoto) {
            // jika Tidak Kosong, maka dihapus
            if ($projek->foto !== "photo.jpg") {
                // Hapus Foto Projek
                $old_foto = public_path('images/admin/' . $projek->foto);
                if (file_exists($old_foto)) unlink($old_foto);
            }

            $foto = time() . "_" . $newFoto->getClientOriginalName();
            $save_db_foto = 'masterproject/' . $foto;

            $dir = public_path('images/admin/masterproject');
            $newFoto->move($dir, $foto);

            $data['foto'] = $save_db_foto;
        }

        $projek->update($data);
        return redirect()->route('projek.index')->with('success', "Projek ({$projek->nama}) milik {$projek->siswa->nama} berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projek $projek)
    {
        $nama = $projek->nama;
        $foto = $projek->foto;
        $siswa = $projek->siswa->nama;

        // Hapus Foto
        if ($foto !== "photo.jpg") {
            $old_foto = public_path('images/admin/' . $foto);
            if (file_exists($old_foto)) unlink($old_foto);
        };
        $projek->delete();

        return redirect()->route('projek.index')->with('success', "Projek ($nama) milik $siswa Telah berhasil dihapus!");
    }
}
