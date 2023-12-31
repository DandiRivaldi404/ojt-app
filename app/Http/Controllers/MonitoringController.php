<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitoring = Monitoring::all();
        return view('monitoring.index', compact(['monitoring']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $lokasi = [];

        if ($user->level === 'dpl') {
            $lokasiDpl = optional($user->dosen->penempatan)->lokasi;
            if ($lokasiDpl) {
                $lokasi[] = $lokasiDpl;
            }
        }

        return view('monitoring.create', compact('lokasi'));
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
            'lokasi_id' => '',
            'keterangan' => '',
            'nidn' => '',
        ]);

        $ValidatedData['nidn'] = Auth()->user()->dosen->nidn;


        Monitoring::create($ValidatedData);
        return redirect()->route('monitoring.index');
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
