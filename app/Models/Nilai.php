<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['nim_id', 'skil_input_data', 'kehadiran', 'np1', 'np2', 'hasil_inputan', 'pekerjaan'];
    public $timestamps = false;

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nim_id');
    }
}
