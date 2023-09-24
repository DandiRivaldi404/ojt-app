<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    // use HasFactory;
    protected $table = 'penempatan_lokasi';
    protected $primaryKey = 'id_penempatan';
    protected $fillable = ['lokasi_id', 'nim', 'nidn'];
    public $timestamps = false;


    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nidn','nidn');
    }
}
