<?php

namespace App\Http\Controllers;

use App\Models\AbsenInstansi;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenInstansiConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Tentukan periode waktu (bulan dan tahun yang ingin Anda rekapi)
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Ambil tanggal awal dan akhir bulan
        $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1);
        $endDate = $startDate->copy()->endOfMonth();

        // Inisialisasi array untuk tanggal-tanggal
        $dates = [];

        // Loop dari tanggal awal hingga akhir bulan
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        // Ambil data absensi dan kelompokkan berdasarkan nama_mahasiswa atau nim_id
        $absensi = AbsenInstansi::all()->groupBy('nim_id'); // Ubah menjadi nim_id jika Anda ingin kelompokkan berdasarkan nim_id

        return view('absensi.index', compact(['absensi', 'dates']));
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
