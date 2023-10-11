<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataojt extends Model
{
    // use HasFactory;
    protected $table = 'dataojt';
    protected $primaryKey = 'id_dataojt';
    protected $fillable = ['angkatan_id','nama_kaprodi', 'nidn_kaprodi',
                            'pendaftaran_mulai', 'pendaftaran_selesai'];
    public $timestamps = false;

    public function angkatan(){
        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }
}
