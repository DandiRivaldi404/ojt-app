<?php

namespace App\Http\Controllers;

use App\Models\AbsenInstansi;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenInstansiConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $absensi = AbsenInstansi::query();

        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $dates = [];

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        if ($user->level === 'dpl') {
            $lokasiDpl = optional($user->dosen->penempatan)->lokasi_id;

            if (!$lokasiDpl) {
                return redirect()->route('dashboard')->with('error', 'Anda belum memiliki penempatan.');
            }

            $absensi->whereHas('mahasiswa', function ($query) use ($lokasiDpl) {
                $query->where('lokasi_id', $lokasiDpl);
            });
        } elseif ($user->level === 'panitia') {
            $absensi = $absensi;
        } else {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki izin akses ke halaman ini.');
        }

        $absensi = $absensi->get();
        return view('absensi.index', compact('absensi', 'dates'));
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('absensi.create', compact(['mahasiswa']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'absensi' => 'required|array',
            'absensi.*.nim_id' => 'required',
            'absensi.*.absen' => 'required|string|in:hadir,alpa,sakit,izin',
        ]);

        $absensiData = $request->input('absensi');

        foreach ($absensiData as &$data) {
            $data['tanggal'] = now()->format('Y-m-d');
            AbsenInstansi::create($data);
        }

        return redirect()->route('absensi.index');
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
