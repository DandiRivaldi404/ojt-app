<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Koordinator;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = User::all();
        return view('akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.create');
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => 'required|max:8',
            'level' => 'required',
            'nidn' => '',
            'nim' => ''
        ]);
    
        $validatedData['password'] = Hash::make($request->password);
    
        $user = User::create($validatedData);
    
        if ($validatedData['level'] === 'mhs') {
            $mhsData = [
                'user_id' => $user->id,
                'nama_mahasiswa' => $validatedData['name'],
                'nim' => $request->input('nim')
            ];
    
            Mahasiswa::create($mhsData);
        } elseif ($validatedData['level'] === 'dpl' || $validatedData['level'] === 'kaprodi') {
            $dosenData = [
                'user_id' => $user->id,
                'nama_lengkap' => $validatedData['name'],
                'nidn' => $request->input('nidn')
            ];
    
            Dosen::create($dosenData);
        } elseif ($validatedData['level'] === 'instansi') {
            $koordinatorData = [
                'user_id' => $user->id,
                'nama_lengkap' => $validatedData['name']
            ];
    
            Koordinator::create($koordinatorData);
        }
    
        return redirect()->route('akun.index');
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
    public function edit(User $akun)
    {
        // $user = User::all();
        return view('akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  User $akun)
    {
        $ValidatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        // $ValidatedData['password'] = Hash::make($request->password);

        // User::create($ValidatedData);
        User::where('id', $akun->id)->update($ValidatedData);
        return redirect()->route('akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $akun)
    {
        User::destroy($akun->id);
        return redirect()->route('akun.index');
    }
}
