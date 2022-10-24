<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_ extends Model
{
    use HasFactory;
    protected $table = 'project_'; 

    protected $fillable = ['id_siswa','nama_project','tanggal','deskripsi','foto'];

    public function project(){
        return $this->belongsTo(Siswa::class);
    }
}
