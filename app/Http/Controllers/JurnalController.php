<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Lokasi;
use Carbon\Carbon;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $jurnal = Jurnal::query();
        $lokasiOptions = Lokasi::all();

        if ($user->level === 'dpl') {
            $lokasiDpl = optional($user->dosen->penempatan)->lokasi_id;

            if (!$lokasiDpl) {
                return redirect()->route('dashboard')->with('error', 'Anda belum memiliki penempatan.');
            }

            $jurnal->whereHas('mahasiswa', function ($query) use ($lokasiDpl) {
                $query->where('lokasi_id', $lokasiDpl);
            });
        } elseif ($user->level === 'mhs') {
            $mahasiswa = $user->mahasiswa;

            if (!$mahasiswa->lokasi) {
                return redirect()->route('dashboard')->with('error', 'Anda belum memiliki lokasi. Anda Bisa Mengakses Jika Memeiliki Lokasi.');
            }

            $jurnal->where('nim_id', $mahasiswa->nim);
        }

        $jurnal = $jurnal->get();

        return view('jurnal.index', compact('jurnal', 'lokasiOptions'));
    }




    public function filterJurnal(Request $request)
    {
        $lokasiId = $request->input('lokasi');

        if ($lokasiId === 'keseluruhan' || $lokasiId === 'Keseluruhan') {
            $jurnal = Jurnal::all();
        } else {
            $jurnal = Jurnal::where('lokasi_id', $lokasiId)->get();
        }

        $lokasiOptions = Lokasi::all();

        return view('jurnal.index', compact('jurnal', 'lokasiOptions'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnal.create');
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
            'tanggal' => 'date',
            'kegiatan' => '',
            'lokasi_id' => '',
            'nim_id' => '',
        ]);

        $ValidatedData['tanggal'] = Carbon::now();
        $ValidatedData['nim_id'] = Auth()->user()->mahasiswa->nim;
        // dd($ValidatedData);

        Jurnal::create($ValidatedData);
        return redirect()->route('jurnal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim_id)
    {
        $jurnal = Jurnal::where('nim_id', $nim_id)->get();

        if ($jurnal->isEmpty()) {
            return redirect()->route('jurnal.index')->with('error', 'Tidak ada jurnal terkait dengan NIM ini.');
        }

        return view('jurnal.show', compact('jurnal'));
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
