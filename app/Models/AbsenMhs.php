<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMhs extends Model
{
    // use HasFactory;
    protected $table = 'absen_mahasiswa';
    protected $primaryKey = 'id_absen';
    protected $fillable = ['lokasi_id', 'nim_id', 'tanggal', 'foto', 'keterangan'];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
