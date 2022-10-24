<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKontak extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
