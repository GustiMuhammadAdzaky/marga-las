<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';



    protected $fillable = [
        'user_id', 'transaksi_data', 'status', 'total_harga', 'tanggal_pesan', 'pengingat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function layananModels()
    {
        return $this->hasMany(LayananModel::class, 'id', 'transaksi_data');
    }



    public function idToData($query)
    {
        foreach ($query as $transaksi) {
            $transaksiDataIds = json_decode($transaksi->transaksi_data);
            $namaAlatArray = LayananModel::whereIn('id', $transaksiDataIds)->pluck('nama_alat')->toArray();

            // Ubah array menjadi string dengan implode
            $transaksi->transaksi_data = implode(', ', $namaAlatArray);

            $transaksi->transaksi_data;
        }

        return $query;
    }
}
