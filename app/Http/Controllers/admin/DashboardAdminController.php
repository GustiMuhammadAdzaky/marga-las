<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Menggunakan metode latest() untuk mendapatkan data yang terbaru
        $transaksiModels = TransaksiModel::latest()->paginate(5);


        $totalOrder = TransaksiModel::count();
        $lunasOrder = TransaksiModel::where('status', 'terbayar')->count();
        $totalKeuntungan = TransaksiModel::where('status', 'terbayar')->sum('total_harga');

        $grafikData = [
            'labels' => $transaksiModels->pluck('tanggal_pesan'),
            'values' => $transaksiModels->pluck('total_harga'),
        ];



        $data = [
            "title" => "Dashboard",
            "totalOrder" => $totalOrder,
            "lunasOrder" => $lunasOrder,
            "totalKeuntungan" => $totalKeuntungan,
            'transaksiModels' => $transaksiModels,
            'grafikData' => $grafikData,
        ];

        return view('admin.dashboard', $data);
    }
}
