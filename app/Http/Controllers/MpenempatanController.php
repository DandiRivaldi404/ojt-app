<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Koordinator;
use App\Models\Lokasi;
use App\Models\Mahasiswa;
use App\Models\Penempatan;
use Illuminate\Http\Request;

class MpenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all();
        $dosen = Dosen::all();
        $lokasi = Lokasi::all();
        $penempatan = Penempatan::all();
        $koordinator = Koordinator::all();
        return view('mpenempatan.index', compact(['mhs', 'lokasi', 'dosen', 'penempatan', 'koordinator']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::all();
        $lokasi = Lokasi::all();
        return view('mpenempatan.create', compact(['dosen', 'lokasi']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'nidn' => '',
            'lokasi_id' => '',
        ]);

        Penempatan::create($ValidatedData);
        return redirect()->route('mpenempatan.index');
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
    public function edit(Penempatan $mpenempatan)
    {
        $lokasi = Lokasi::all();
        return view('mpenempatan.edit', compact(['mpenempatan', 'lokasi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penempatan $mpenempatan)
    {

        $ValidatedData = $request->validate([
            'nidn' => '',
            'lokasi_id' => ''
        ]);

        Penempatan::where('id_penempatan', $mpenempatan->id_penempatan)->update($ValidatedData);
        return redirect()->route('mpenempatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
