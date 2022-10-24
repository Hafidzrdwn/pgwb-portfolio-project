<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'jenis_kontak_siswa';

    public function jenis_kontak()
    {
        return $this->belongsTo(JenisKontak::class);
    }
}
