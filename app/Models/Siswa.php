<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; 

    protected $fillable = ['nisn','nama','email','alamat','jk','foto','about'];
      
    public function project(){
        return $this->hasMany(Project_::class, 'id_siswa');
    }

    public function kontak(){
        return $this->hasMany(kontak_::class, 'id_siswa');
    }
}
