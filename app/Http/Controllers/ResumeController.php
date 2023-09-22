<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


// Auth

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resume = Mahasiswa::where('user_id', Auth::user()->id)->get();
        return view('resume.index', compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Mahasiswa $resume)
    {
        $agama = Agama::all();
        return view('resume.edit', compact('resume', 'agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $resume)
    {
        $ValidatedData = $request->validate([
            'nim' => '',
            'user_id' => '',
            'nama_mahasiswa' => '',
            'semester' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'agama_id' => '',
            'alamat' => '',
            'no_hp' => '',
            'ukuran_baju' => '',
            'slip_pembayaran' => '',
            'transkip' => '',
            'ktm' => '',
            'pas_photo' => '',
        ]);

        if ($request->file('slip_pembayaran')) {
            $uploadPath = 'post-pembayaran';
            $filename = $request->file('slip_pembayaran')->getClientOriginalName();
            $filePath = $request->file('slip_pembayaran')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['slip_pembayaran'] = 'storage/' . $uploadPath . '/' . $filename;
        }

        if ($request->file('transkip')) {
            $uploadPath = 'post-transkip';
            $filename = $request->file('transkip')->getClientOriginalName();
            $filePath = $request->file('transkip')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['transkip'] = 'storage/' . $uploadPath . '/' . $filename;
        }

        if ($request->file('ktm')) {
            $uploadPath = 'post-ktm';
            $filename = $request->file('ktm')->getClientOriginalName();
            $filePath = $request->file('ktm')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['ktm'] = 'storage/' . $uploadPath . '/' . $filename;
        }

        if ($request->file('pas_photo')) {
            $uploadPath = 'post-photo';
            $filename = $request->file('pas_photo')->getClientOriginalName();
            $filePath = $request->file('pas_photo')->storeAs('public/' . $uploadPath, $filename);
            $ValidatedData['pas_photo'] = 'storage/' . $uploadPath . '/' . $filename;
        }
        

        Mahasiswa::where('nim', $resume->nim)->update($ValidatedData);
        return redirect()->route('resume.index');
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
