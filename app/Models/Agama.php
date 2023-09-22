<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    // use HasFactory;
    protected $table = 'tb_agama';
    protected $primaryKey = 'id_agama';
    protected $fillable = ['nama_agama'];
    public $timestamps = false;
                            

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class);
    }
}
