<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    // use HasFactory;
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $fillable = ['nama_instansi', 'visi_misi', 'foto_instansi'];
    public $timestamps = false;

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class);
    }

    public function penempatan(){
        return $this->hasOne(Penempatan::class);
    }

    public function koordinator(){
        return $this->hasOne(Koordinator::class);
    }
}
