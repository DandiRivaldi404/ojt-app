<?php

namespace App\Http\Controllers;

use App\Models\Filebrks;
use Illuminate\Http\Request;

class FilebrksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filebrks = filebrks::all();
        return view('filebrks.index', compact('filebrks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filebrks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidateData = $request-> validate([
            'terdaftar' => '',
            'memenuhi_syarat' => '',
            'terdaftar_peserta' => '',
            'pembayaran' => '',

        ]);
        filebrks::created($ValidateData);
        return redirect()->route('filebrks.index');
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
    public function edit(filebrks $filebrks)
    {
        return view('filebrks.edit', compact('filebrks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, filebrks $filebrks)
    {
        $ValidateData = $request-> validate([
            'terdaftar' => '',
            'memenuhi_syarat' => '',
            'terdaftar_peserta' => '',
            'pembayaran' => '',
        ]);
        filebrks::where('id_filebrks', $filebrks->id_filebrks)->update($ValidateData);
        return redirect('dashboard');
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
