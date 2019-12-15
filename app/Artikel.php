<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'dokter_id', 'judul_artikel', 'isi_artikel', 'gambar_artikel',
    ];
}
