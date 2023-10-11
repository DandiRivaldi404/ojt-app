<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarNilai extends Model
{
    // use HasFactory;
    protected $table = 'daftar_nilai_kampus';
    protected $primaryKey = 'id_daftar_nilai_kampus';
    protected $fillable = ['daftar_nilai_kampus','angkatan_id'];
    public $timestamps = false;
                            

    public function angkatan(){
        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }

    public function penilaiank(){
        return $this->hasOne(Penilaian::class);
    }
}
