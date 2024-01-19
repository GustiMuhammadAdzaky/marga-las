<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    use HasFactory;

    protected $table = 'tb_layanan';
    protected $fillable = [
        'id',
        "nama_alat",
        'deskripsi_layanan',
        'harga_layanan',
        'kategori_id',
        'gambar',
    ];

    public function kategori()
    {
        // return $this->belongsTo(KategoriLayananAdminModel::class, 'kategori_id');
        return $this->belongsTo(KategoriLayananAdminModel::class, 'kategori_id', 'id');
    }

    public $timestamps = false; // Menonaktifkan timestamps


}
