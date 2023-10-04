<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarNilaiInstansi extends Model
{
    // use HasFactory;
    protected $table = 'daftar_nilai_instansi';
    protected $primaryKey = 'id_daftar_nilai_instansi';
    protected $fillable = ['daftar_nilai_instansi','angkatan_id'];
    public $timestamps = false;
                            

    public function angkatan(){
        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }

    public function penilaian(){
        return $this->hasOne(PenilaianInstansi::class);
    }
}
