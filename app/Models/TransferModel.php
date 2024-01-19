<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferModel extends Model
{
    use HasFactory;
    protected $table = 'tb_transfer';
    protected $fillable = [
        'id',
        "transaksi_id",
        "nama_pembeli",
        "gambar",
    ];
    public $timestamps = false;
}
