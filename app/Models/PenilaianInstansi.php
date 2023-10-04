<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianInstansi extends Model
{
    use HasFactory;
    protected $table = 'penilaian_instansi';
    protected $primaryKey = 'id_penilaian_instansi';
    protected $fillable = ['nim_id','koordinator_id','daftar_nilai_instansi_id','nilai_angka'];
    public $timestamps = false;
                            
    
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }

    public function daftarnilaiinstansi(){
        return $this->belongsTo(DaftarNilaiInstansi::class, 'daftar_nilai_instansi_id');
    }
}
