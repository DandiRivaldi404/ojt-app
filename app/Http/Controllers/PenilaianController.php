<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\DaftarNilai;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
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
    
        $penilaian = Penilaian::with('mahasiswa','daftarnilai');
    
        $data = [];
    
        if ($level == 'panitia') {
            $penilaian = $penilaian->get();
        } elseif ($level == 'dpl') {
            if ($user->dosen && $user->dosen->penempatan) {
                $lokasiDpl = $user->dosen->penempatan->lokasi_id;
                $penilaian = $penilaian->whereHas('mahasiswa', function ($query) use ($lokasiDpl) {
                    $query->where('lokasi_id', $lokasiDpl);
                })->get();
            } else {
                return redirect()->route('dashboard')->with('error', 'Anda Belum Memiliki Lokasi Penempatan');
            }
        } elseif ($level == 'instansi') {
            if ($user->koordinator && $user->koordinator->lokasi) {
                $lokasiKoordinator = $user->koordinator->lokasi_id;
                $penilaian = $penilaian->whereHas('mahasiswa', function ($query) use ($lokasiKoordinator) {
                    $query->where('lokasi_id', $lokasiKoordinator);
                })->get();
            } else {
                return redirect()->route('dashboard')->with('error', 'Anda Belum Memiliki Lokasi Penempatan');
            }
        }
    
        $groupedData = $penilaian->groupBy(function ($item) {
            return $item->mahasiswa->nim . '-' . $item->daftarnilai->daftar_nilai_kampus;
        });
    
        foreach ($groupedData as $key => $items) {
            list($nim, $nilai) = explode('-', $key);
            $data[$nim][$nilai] = $items->pluck('nilai_angka')->toArray();
        }
    
        return view('penilaian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan = Angkatan::all();
        $daftar = DaftarNilai::all();
        $mhs = Mahasiswa::all();
        $penilaian = Penilaian::all();
        return view('penilaian.create', compact(['mhs', 'daftar', 'angkatan', 'penilaian']));
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
            'nilai_angka.*.*' => '',
            'daftar_nilai_kampus_id' => '',
            'nim_id' => '',
        ]);
        // dd($request);


        $angkaNilai = $request->input('nilai_angka');
        $daftarId = $request->input('daftar_nilai_kampus_id');
        $nim = $request->input('nim_id');

        // dd($request);

        if ($angkaNilai && $daftarId && $nim) {
            $dataToInsert = [];

            foreach ($nim as $key => $nimValue) {
                foreach ($daftarId[$key] as $daftarIdValue) {
                    $nilai = $angkaNilai[$key][$daftarIdValue];

                    $dataToInsert[] = [
                        'nim_id' => $nimValue,
                        'daftar_nilai_kampus_id' => $daftarIdValue,
                        'nilai_angka' => $nilai,
                    ];
                }
            }

            Penilaian::insert($dataToInsert);
        }

        return redirect()->route('penilaian.index')
            ->with('success', 'Data berhasil disimpan!');
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
