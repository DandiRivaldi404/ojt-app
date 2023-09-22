<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    // use HasFactory;
    protected $table = 'tugas_akhir';
    protected $primaryKey = 'id_tugas';
    protected $fillable = ['nim_id', 'upload_file', 'lokasi_id','tanggal'];
    public $timestamps = false;


    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
