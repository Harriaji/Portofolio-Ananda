<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kontak extends Model
{
    use HasFactory;
    protected $table = 'jenis_kontak'; 
    protected $fillable = ['jns'];

    public function kontak(){
        return $this->hasMany(Kontak_::class);
    }
}
