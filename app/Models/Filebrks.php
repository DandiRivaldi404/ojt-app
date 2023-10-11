<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filebrks extends Model
{
    // use HasFactory;
    protected $table = 'filebrks';
    protected $primaryKey = 'id_filebrks';
    protected $fillable = ['terdaftar','memenuhi_syarat', 'terdaftar_peserta',
                            'pembayaran',];
    public $timestamps = false;
}
