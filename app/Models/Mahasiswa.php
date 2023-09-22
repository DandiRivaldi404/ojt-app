<?php

namespace App\Models;

use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Model
{
    // use HasFactory, HasUuids;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nama_mahasiswa','semester',
                            'jenis_kelamin','tempat_lahir',
                            'tanggal_lahir','agama',
                            'alamat','no_hp',
                            'ukuran_baju','slip_pembayaran',
                            'transkip','ktm',
                            'pas_photo','user_id','agama_id','lokasi_id'];
                            

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function absensiinstansi(){
        return $this->hasOne(AbsenInstansi::class);
    }

    public function tugasakhir(){
        return $this->hasOne(TugasAkhir::class);
    }

    public function jurnal(){
        return $this->hasOne(Jurnal::class);
    }

    public function suratizin(){
        return $this->hasOne(SuratIzin::class);
    }

    public function absenmhs(){
        return $this->hasOne(AbsenMhs::class);
    }

    public function agama(){
        return $this->belongsTo(Agama::class, 'agama_id');
    }

}
