<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $user = Auth::user(); 
    $level = $user->level;

    if ($level === 'panitia') {
        $mhs = Mahasiswa::all();
    } elseif ($level === 'dpl') {
        if ($user->dosen && $user->dosen->penempatan) {
            $lokasiDpl = $user->dosen->penempatan->lokasi_id; 
            $mhs = Mahasiswa::where('lokasi_id', $lokasiDpl)->get();
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda Belum Memiliki Lokasi Penempatan');
        }
    } elseif ($level === 'instansi') {
        if($user->koordinator && $user->koordinator->lokasi) {
            $lokasiKoodinator = $user->koordinator->lokasi_id;
            $mhs = Mahasiswa::where('lokasi_id', $lokasiKoodinator)->get();
        }
    } else {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

    return view('mahasiswa.index', compact('mhs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $mhs = Mahasiswa::find($nim);
        return view('mahasiswa.show', compact(['mhs']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $lokasi = Lokasi::all();
        return view('mahasiswa.edit', compact(['mahasiswa','lokasi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Mahasiswa $mahasiswa)
    {
        $ValidatedData = $request->validate([
            'nama_mahasiswa' => '',
            'semester' => '',
            'lokasi_id' => ''
        ]);

        Mahasiswa::where('nim', $mahasiswa->nim)->update($ValidatedData);
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
