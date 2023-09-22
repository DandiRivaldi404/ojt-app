<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    // use HasFactory;
    protected $table = 'monitoring';
    protected $primaryKey = 'nidn';
    protected $fillable = ['lokasi_id', 'nidn', 'tanggal', 'keterangan'];
    public $timestamps = false;

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nidn');
    }
}
