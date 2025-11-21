<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $casts = [
    'jurusan' => 'array',
    ];

    protected $guarded = ['id'];
    public function siswa(){
    return $this->hasMany(Siswa::class, 'asal_sekolah_id');
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
}
