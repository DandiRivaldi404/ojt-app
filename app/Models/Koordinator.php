<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    // use HasFactory;
    protected $table = 'koordinator_lapangan';
    protected $primaryKey = 'id_koordinator';
    protected $fillable = ['user_id', 'nama_lengkap', 'jenis_kelamin', 'jabatan','lokasi_id'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class,'lokasi_id');
    }
}
