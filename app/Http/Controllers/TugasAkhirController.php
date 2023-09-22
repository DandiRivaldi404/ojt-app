<?php

namespace App\Http\Controllers;

use App\Models\TugasAkhir;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugasakhir = TugasAkhir::all();
        return view('tugasakhir.index', compact(['tugasakhir']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugasakhir.create');
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
            'tanggal' => '',
            'upload_file' => '',
            'lokasi_id' => '',
            'nim_id' => '',
        ]);
        // dd($ValidatedData);

        $ValidatedData['nim_id'] = Auth()->user()->mahasiswa->nim;
        $ValidatedData['tanggal'] = Carbon::now();

        if ($request->file('upload_file')) {
            $uploadPath = 'post-file';
            $filename = $request->file('upload_file')->getClientOriginalName();
            $filePath = $request->file('upload_file')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['upload_file'] = 'storage/' . $uploadPath . '/' . $filename;
        }


        TugasAkhir::create($ValidatedData);
        return redirect()->route('tugasakhir.index');
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
