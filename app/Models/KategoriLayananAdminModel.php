<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLayananAdminModel extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori';
    protected $fillable = [
        'id',
        "nama_kategori",
    ];

    public $timestamps = false; // Menonaktifkan timestamps
}
