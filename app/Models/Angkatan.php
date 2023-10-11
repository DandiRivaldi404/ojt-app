<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{

    protected $table = 'angkatan';
    protected $primaryKey = 'id_angkatan';
    protected $fillable = ['daftar_angkatan'];
    public $timestamps = false;

    public function daftarnilaiinstansi(){
        return $this->hasOne(DaftarNilaiInstansi::class);
    }

    public function dataojt(){
        return $this->hasOne(Dataojt::class);
    }
}
