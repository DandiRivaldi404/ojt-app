<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Dataojt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DataojtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataojt = Dataojt::all();

        $formattedDataojts = $dataojt->map(function ($item) {
            $item->formatted_pendaftaran_mulai = Carbon::parse($item->pendaftaran_mulai)->format('F d, Y');
            $item->formatted_pendaftaran_selesai = Carbon::parse($item->pendaftaran_selesai)->format('F d, Y');
            return $item;
        });

        return view('dataojt.index', compact('dataojt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan  = Angkatan::all();
        return view('dataojt.create', compact(['angkatan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'angkatan_id' => '',
            'nama_kaprodi' => '',
            'nidn_kaprodi' => '',
            'pendaftaran_mulai' => 'required|date', // Pastikan tanggal awal valid
            'pendaftaran_selesai' => 'required|date', // Pastikan tanggal akhir valid
        ]);

        // Ambil tanggal dari permintaan dan ubah ke format "YYYY-MM-DD"
        $startDate = Carbon::parse($validatedData['pendaftaran_mulai'])->format('Y-m-d');
        $endDate = Carbon::parse($validatedData['pendaftaran_selesai'])->format('Y-m-d');

        // Simpan tanggal dalam format "YYYY-MM-DD" ke dalam database
        Dataojt::create([
            'angkatan_id' => $validatedData['angkatan_id'],
            'nama_kaprodi' => $validatedData['nama_kaprodi'],
            'nidn_kaprodi' => $validatedData['nidn_kaprodi'],
            'pendaftaran_mulai' => $startDate,
            'pendaftaran_selesai' => $endDate,
        ]);

        return redirect()->route('dataojt.index');
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
    public function edit(Dataojt $dataojt)
    {
        return view('dataojt.edit', compact('dataojt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataojt $dataojt)
    {
        $ValidateData = $request->validate([
            'angkatan' => '',
            'nama_kaprodi' => '',
            'nidn_kaprodi' => '',
            'pendaftaran_mulai' => '',
            'pendaftaran_selesai' => '',
        ]);

        Dataojt::where('id_dataojt', $dataojt->id_dataojt)->update($ValidateData);
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
