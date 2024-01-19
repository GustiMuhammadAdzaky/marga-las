<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakModel extends Model
{
    use HasFactory;


    protected $table = 'tb_kontak';
    protected $fillable = [
        'id',
        "nama",
        'nomor',
        'email',
        'pesan',
    ];
    public $timestamps = false;
}
