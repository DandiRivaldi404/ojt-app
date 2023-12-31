<?php

namespace App\Http\Controllers;

use App\Models\AbsenMhs;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $user = Auth::user();
    $absenku = AbsenMhs::query();
    $lokasiOptions = Lokasi::all();

    if ($user->level === 'dpl') {
        $lokasiDpl = optional($user->dosen->penempatan)->lokasi_id;

        if (!$lokasiDpl) {
            return redirect()->route('dashboard')->with('error', 'Anda belum memiliki penempatan.');
        }

        $absenku->whereHas('mahasiswa', function ($query) use ($lokasiDpl) {
            $query->where('lokasi_id', $lokasiDpl);
        });
    } elseif ($user->level === 'mhs') {
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa->lokasi) {
            return redirect()->route('dashboard')->with('error', 'Anda belum memiliki lokasi. Anda Bisa Mengakses Jika Memeiliki Lokasi.');
        }

        $absenku->where('nim_id', $mahasiswa->nim);
    }

    $absenku = $absenku->get();

    return view('absenku.index', compact(['absenku', 'lokasiOptions']));
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = AbsenMhs::all();
        return view('absenku.create', compact('mhs'));
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
            'keterangan' => '',
            'foto' => '',
            'lokasi_id' => '',
            'nim_id' => '',
        ]);

        $ValidatedData['nim_id'] = Auth()->user()->mahasiswa->nim;
        $ValidatedData['lokasi_id'] = Auth()->user()->mahasiswa->lokasi_id;

        if ($request->file('foto')) {
            $uploadPath = 'post-absenku';
            $filename = $request->file('foto')->getClientOriginalName();
            $filePath = $request->file('foto')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['foto'] = 'storage/' . $uploadPath . '/' . $filename;
        }


        AbsenMhs::create($ValidatedData);
        return redirect()->route('absenku.index');
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
