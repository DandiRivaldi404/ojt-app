<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    // use HasFactory;
    protected $table = 'surat_izin';
    protected $primaryKey = 'id_surat';
    protected $fillable = ['tgl_awal', 'tgl_akhir', 'keterangan', 'status', 'nim_id'];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
