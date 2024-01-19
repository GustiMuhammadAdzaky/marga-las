<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayananAdminModel;
use App\Models\LayananModel;
use Illuminate\Http\Request;

class LayananController extends Controller
{


    public function index(Request $request)
    {
        $kategoriLayanan = KategoriLayananAdminModel::all();

        // Filter data berdasarkan kategori jika parameter kategori ada
        $layananModel = LayananModel::when($request->kategori, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($q) use ($kategori) {
                $q->where('nama_kategori', $kategori);
            });
        })->paginate(6); // Ubah angka 6 sesuai dengan jumlah data per halaman yang diinginkan

        return view("/layanan", compact("layananModel", "kategoriLayanan"));
    }
}
