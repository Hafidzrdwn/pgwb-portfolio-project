<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $siswas = Siswa::with('kontaks')->paginate(4);
        $links = self::getLinks();
        return view('admin.mastercontact.index', compact('siswas', 'links'));
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
        $jenis_kontaks = JenisKontak::all(['id', 'jenis_kontak']);
        $_l = self::getLinks();

        foreach ($_l as $key => $val) {
            $links[$key] = [
                'link' => $val,
            ];

            switch ($key) {
                case 'whatsapp':
                    $links[$key]['placeholder'] = 'Masukkan nomor telepon/wa anda..';
                    break;
                case 'youtube':
                    $links[$key]['placeholder'] = 'Masukkan nama channel anda..';
                    break;
                default:
                    $links[$key]['placeholder'] = "Masukkan username {$key} anda..";
                    break;
            }
        }

        return view('admin.mastercontact.create', compact('siswa', 'jenis_kontaks', 'links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'jenis_kontak' => 'required',
            'deskripsi' => 'required|string',
        ]);

        $validatedData['jenis_kontak_id'] = $validatedData['jenis_kontak'];

        Kontak::create($validatedData);

        return redirect()->route('kontak.index')->with('success', '<strong>Kontak baru</strong> berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $kontak)
    {
        $kontaks = $kontak->kontaks;
        $links = self::getLinks();

        // return response()->json($kontaks);
        return view('admin.mastercontact.show', compact('kontaks', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontak $kontak)
    {
        $jenis_kontaks = JenisKontak::all(['id', 'jenis_kontak']);
        $_l = self::getLinks();

        foreach ($_l as $key => $val) {
            $links[$key] = [
                'link' => $val,
            ];

            switch ($key) {
                case 'whatsapp':
                    $links[$key]['placeholder'] = 'Masukkan nomor telepon/wa anda..';
                    break;
                case 'youtube':
                    $links[$key]['placeholder'] = 'Masukkan nama channel anda..';
                    break;
                default:
                    $links[$key]['placeholder'] = "Masukkan username {$key} anda..";
                    break;
            }
        }

        return view('admin.mastercontact.edit', compact('kontak', 'jenis_kontaks', 'links'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontak $kontak)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'jenis_kontak' => 'required',
            'deskripsi' => 'required|string',
        ]);

        $validatedData['jenis_kontak_id'] = $validatedData['jenis_kontak'];

        $kontak->update($validatedData);

        return redirect()->route('kontak.index')->with('success', '<strong>Kontak berhasil diedit!!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('kontak.index')->with('success', '<strong>Kontak</strong> berhasil dihapus!!');
    }
}
