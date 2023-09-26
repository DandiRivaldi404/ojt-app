<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiInstansi extends Model
{
    // use HasFactory;
    protected $table = 'nilai_instansi';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['nim_id', 'koordinator_id', 'nk1', 'nk2', 'nk3', 'nk4', 'nk5', 'ip'];
    public $timestamps = false;

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
