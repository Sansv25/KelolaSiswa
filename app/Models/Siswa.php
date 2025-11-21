<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $with = ['sekolah'];
    protected $table = 'siswa';

    protected $guarded = ['id'];
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'asal_sekolah_id');
    }
    
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'asal_provinsi_id');
    }
}
