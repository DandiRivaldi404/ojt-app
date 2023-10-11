<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    // use HasFactory;
    protected $table = 'penilaian_kampus';
    protected $primaryKey = 'id_penilaian_kampus';
    protected $fillable = ['nim_id','daftar_nilai_kampus_id','nilai_angka'];
    public $timestamps = false;
                            
    
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }

    public function daftarnilai(){
        return $this->belongsTo(DaftarNilai::class, 'daftar_nilai_kampus_id');
    }
}
