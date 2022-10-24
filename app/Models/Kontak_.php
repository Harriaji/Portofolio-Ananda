<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak_ extends Model
{
    use HasFactory;
    protected $table = 'kontak_'; 
    protected $fillable = ['id_siswa','id_jenis','desc_kontak'];

    public function siswa (){
        return $this->belongsTo(Siswa::class , 'id');
    }
    public function jenis (){
        return $this->belongsTo(jenis_kontak::class , 'id_jenis');
    }

}
