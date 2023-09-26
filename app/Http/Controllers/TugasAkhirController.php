<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\TugasAkhir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tugasakhir = TugasAkhir::query();
        $lokasiOptions = Lokasi::all();

        if ($user->level === 'dpl') {
            $lokasiDpl = optional($user->dosen->penempatan)->lokasi_id;

            if (!$lokasiDpl) {
                return redirect()->route('dashboard')->with('error', 'Anda belum memiliki penempatan.');
            }

            $tugasakhir->whereHas('mahasiswa', function ($query) use ($lokasiDpl) {
                $query->where('lokasi_id', $lokasiDpl);
            });
        } elseif ($user->level === 'mhs') {
            $mahasiswa = $user->mahasiswa;

            if (!$mahasiswa->lokasi) {
                return redirect()->route('dashboard')->with('error', 'Anda belum memiliki lokasi. Anda Bisa Mengakses Jika Memeiliki Lokasi.');
            }

            $tugasakhir->where('nim_id', $mahasiswa->nim);
        }

        $tugasakhir = $tugasakhir->get();

        return view('tugasakhir.index', compact('tugasakhir', 'lokasiOptions'));
    }

    // public function index()
    // {
    //     $user = Auth::user();
    //     $tugasakhir = TugasAkhir::query();

    //     if ($user->level === 'panitia') {
    //         $tugasakhir = TugasAkhir::all();

    //         return view('tugasakhir.index', compact('tugasakhir'));
    //     }

    //     $mahasiswa = $user->mahasiswa;

    //     if (!$mahasiswa->lokasi) {
    //         return redirect()->route('dashboard')->with('error', 'Anda belum memiliki lokasi. Anda Bisa Mengakses Jika Memeiliki Lokasi.');
    //     }

    //     $tugasakhir = TugasAkhir::where('nim_id', $mahasiswa->nim)->get();

    //     return view('tugasakhir.index', compact('tugasakhir'));
    // }



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
