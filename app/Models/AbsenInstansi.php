<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenInstansi extends Model
{
    // use HasFactory;
    protected $table = 'absen_instansi';
    protected $primaryKey = 'id_absen_instansi';
    protected $fillable = ['nim_id', 'id_koordinator', 'tanggal', 'absen'];
    public $timestamps = false;


    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
