<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $guarded = ['id'];

    public function projeks()
    {
        return $this->hasMany(Projek::class);
    }

    public function kontaks()
    {
        return $this->belongsToMany(JenisKontak::class)->withPivot('deskripsi', 'id');
    }
}
