<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    use HasFactory;
    protected $table = 'tb_galeri';
    protected $fillable = [
        'id',
        "gambar",
    ];
    public $timestamps = false;
}
