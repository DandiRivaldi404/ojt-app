<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\DaftarNilaiInstansi;
use App\Models\Dataojt;
use App\Models\Lokasi;
use App\Models\Mahasiswa;
use App\Models\PenilaianInstansi;
use App\Models\PenilainInstansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PenilaianInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $level = $user->level;
        
        $penilaian = PenilaianInstansi::with('mahasiswa', 'daftarnilaiinstansi');
        
        $dataojt = Dataojt::where('status', 1)->first();
        
        if ($dataojt) {
            $angkatanId = $dataojt->angkatan_id;

            $daftar = DaftarNilaiInstansi::where('angkatan_id', $angkatanId)->get();            
            $penilaian = $penilaian->whereHas('daftarnilaiinstansi', function ($query) use ($angkatanId) {
                $query->where('angkatan_id', $angkatanId);
            });
            
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
                    $lokasiKoordinator = optional($user->koordinator)->lokasi_id;
                    $penilaian = $penilaian->whereHas('mahasiswa', function ($query) use ($lokasiKoordinator) {
                        $query->where('lokasi_id', $lokasiKoordinator);
                    })->get();
                } else {
                    return redirect()->route('dashboard')->with('error', 'Anda Belum Memiliki Lokasi Penempatan');
                }
            }
            
            $groupedData = $penilaian->groupBy(function ($item) {
                return $item->mahasiswa->nim . '-' . $item->daftarnilaiinstansi->daftar_nilai_instansi;
            });
            
            $data = [];
            foreach ($groupedData as $key => $items) {
                list($nim, $nilai) = explode('-', $key);
                $data[$nim][$nilai] = $items->pluck('nilai_angka')->toArray();
            }
            
            return view('penilaianinstansi.index', compact('data', 'daftar'));
        } else {
            return redirect()->back()->with('error', 'Dataojt dengan status 1 tidak ditemukan.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        $penilaian = PenilaianInstansi::query();
        $lokasiOptions = Lokasi::all();

        $dataojt = Dataojt::where('status', 1)->first();

        if ($dataojt) {
            $angkatanId = $dataojt->angkatan_id;
            $daftar = DaftarNilaiInstansi::where('angkatan_id', $angkatanId)->get();


            if ($user->level === 'instansi') {
                $lokasiKoordinator = optional($user->koordinator)->lokasi_id;
                $mhs = Mahasiswa::where('lokasi_id', $lokasiKoordinator)->get();
            } else {
                $mhs = Mahasiswa::all();
            }

            $penilaian = PenilaianInstansi::all();

            return view('penilaianinstansi.create', compact('mhs', 'daftar', 'dataojt', 'penilaian'));
        } else {
            return redirect()->back()->with('error', 'Dataojt dengan status 1 tidak ditemukan.');
        }
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
            'daftar_nilai_instansi_id' => '',
            'nim_id' => '',
        ]);
        // dd($request);


        $angkaNilai = $request->input('nilai_angka');
        $daftarId = $request->input('daftar_nilai_instansi_id');
        $nim = $request->input('nim_id');

        // dd($request);

        if ($angkaNilai && $daftarId && $nim) {
            $dataToInsert = [];

            foreach ($nim as $key => $nimValue) {
                foreach ($daftarId[$key] as $daftarIdValue) {
                    $nilai = $angkaNilai[$key][$daftarIdValue];

                    $dataToInsert[] = [
                        'nim_id' => $nimValue,
                        'daftar_nilai_instansi_id' => $daftarIdValue,
                        'nilai_angka' => $nilai,
                    ];
                }
            }

            PenilaianInstansi::insert($dataToInsert);
        }

        return redirect()->route('penilaianinstansi.index')
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
    public function edit($nim_id)
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
