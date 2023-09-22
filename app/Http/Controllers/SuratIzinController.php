<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = SuratIzin::all();
        return view('surat.index', compact(['surat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.create');
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
            'tgl_awal' => '',
            'tgl_akhir' => '',
            'keterangan' => '',
            'nim_id' => '',
            'status' => '',
        ]);


        $validatedData['status'] = 'di proses';
        $validatedData['nim_id'] = Auth()->user()->mahasiswa->nim;
        $tglAwal = Carbon::createFromFormat('d/m/Y', $validatedData['tgl_awal'])->format('Y-m-d');
        $tglAkhir = Carbon::createFromFormat('d/m/Y', $validatedData['tgl_akhir'])->format('Y-m-d');

        $dataToInsert = [
            'tgl_awal' => $tglAwal,
            'tgl_akhir' => $tglAkhir,
            'keterangan' => $validatedData['keterangan'],
            'nim_id' => $validatedData['nim_id'],
            'status' => $validatedData['status'],
        ];

        SuratIzin::create($dataToInsert);
        return redirect()->route('surat.index');
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

    public function editstatus(Request $request, $id_surat)
    {
        $surat = SuratIzin::find($id_surat);
        $surat->status = $request->status;
        $surat->update();

        return redirect()->route('surat.index');
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
