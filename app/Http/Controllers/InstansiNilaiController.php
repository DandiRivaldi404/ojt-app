<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Mahasiswa;
use App\Models\NilaiInstansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstansiNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lokasiId = $request->input('lokasi');

        $nilaiQuery = NilaiInstansi::query();

        if ($lokasiId) {
            $nilaiQuery->where('lokasi_id', $lokasiId);
        }

        $nilai = $nilaiQuery->get();
        $lokasiOptions = Lokasi::all();

        return view('instansinilai.index', compact(['nilai', 'lokasiOptions']));
    }

    public function filterNilaiInstansi(Request $request)
    {
        $lokasiId = $request->input('lokasi');

        if ($lokasiId === 'keseluruhan' || $lokasiId === 'Keseluruhan') {
            $nilai = NilaiInstansi::all();
        } else {
            $nilai = NilaiInstansi::whereHas('mahasiswa', function ($query) use ($lokasiId) {
                $query->where('lokasi_id', $lokasiId);
            })->get();
        }

        $lokasiOptions = Lokasi::all();

        return view('instansinilai.index', compact(['nilai', 'lokasiOptions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    
    $lokasiKoordinator = Auth::user()->koordinator->lokasi_id;
    $mhs = Mahasiswa::where('lokasi_id', $lokasiKoordinator)->get();

    return view('instansinilai.create', compact('mhs'));
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
            'nim_id' => '',
            'koordinator_id' => '',
            'nk1' => '',
            'nk2' => '',
            'nk3' => '',
            'nk4' => '',
            'nk5' => '',
            'ip' => '',
        ]);

        $ValidatedData['koordinator_id'] = Auth()->user()->koordinator->id_koordinator;

        NilaiInstansi::create($ValidatedData);
        return redirect()->route('instansinilai.index');
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
