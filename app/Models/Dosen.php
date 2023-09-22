<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    protected $fillable = ['nidn', 'user_id', 'nama_lengkap', 'alamat'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function monitoring(){
        return $this->hasOne(Monitoring::class);
    }

    public function penempatan(){
        return $this->hasOne(Penempatan::class);
    }
}
