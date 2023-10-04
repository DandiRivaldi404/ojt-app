<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\DaftarNilaiInstansi;
use App\Models\Mahasiswa;
use App\Models\PenilaianInstansi;
use App\Models\PenilainInstansi;
use Illuminate\Http\Request;

class PenilaianInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penilaian = PenilaianInstansi::with('mahasiswa', 'daftarnilaiinstansi')->get();
        $data = [];
        foreach ($penilaian as $item) {
            $nim = $item->mahasiswa->nim;
            $nilai = $item->daftarnilaiinstansi->daftar_nilai_instansi;
            $angka_nilai = $item->nilai_angka;

            if (!isset($data[$nim][$nilai])) {
                $data[$nim][$nilai] = [];
            }

            $data[$nim][$nilai][] = $angka_nilai;
        }

        return view('penilaianinstansi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan = Angkatan::all();
        $daftar = DaftarNilaiInstansi::all();
        $mhs = Mahasiswa::all();
        $penilaian = PenilaianInstansi::all();
        return view('penilaianinstansi.create', compact(['mhs', 'daftar', 'angkatan', 'penilaian']));
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
