<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use Illuminate\Http\Request;

class JenisKontakController extends Controller
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
        $jenis_kontaks = JenisKontak::all();
        return view('admin.mastercontact.jenis_kontak.index', compact('jenis_kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kontak' => 'required',
        ]);

        JenisKontak::create($request->all());

        return redirect()->route('jenis_kontak.index')
            ->with('success', '<strong>Jenis Kontak Baru</strong> berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKontak $jenis_kontak)
    {
        $request->validate([
            'jenis_kontak' => 'required',
        ]);

        $jenis_kontak->update($request->all());

        return redirect()->route('jenis_kontak.index')
            ->with('success', '<strong>Jenis Kontak</strong> berhasil diedit!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKontak $jenis_kontak)
    {
        $jenis_kontak->delete();

        return redirect()->route('jenis_kontak.index')
            ->with('success', '<strong>Jenis Kontak</strong> berhasil dihapus!!');
    }
}
