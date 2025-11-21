<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';

    protected $guarded = ['id'];

    public function sekolah()
{
    return $this->hasMany(Sekolah::class);
}

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'asal_provinsi_id');
    }


}
