<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    // use HasFactory;
    protected $table = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $fillable = ['tanggal', 'kegiatan', 'nim_id', 'lokasi_id'];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
