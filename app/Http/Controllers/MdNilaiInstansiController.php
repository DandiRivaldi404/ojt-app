<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\DaftarNilaiInstansi;
use Illuminate\Http\Request;

class MdNilaiInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaiinstansi = DaftarNilaiInstansi::all();
        return view('mdnilaiinstansi.index', compact(['nilaiinstansi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan = Angkatan::all();
        return view('mdnilaiinstansi.create', compact(['angkatan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'angkatan_id' => '',
            'daftar_nilai_instansi.*' => '',
        ]);

        foreach ($data['daftar_nilai_instansi'] as $nilai) {
            DaftarNilaiInstansi::create([
                'angkatan_id' => $data['angkatan_id'],
                'daftar_nilai_instansi' => $nilai,
            ]);
        }
        return redirect()->route('mdnilaiinstansi.index')->with('success', 'Data Berhasil Tersimpan');
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
    public function update(Request $request, $id)
    {
        //
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
