<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;


class LaporanPenjualanController extends Controller
{
    // public function index()
    // {
    //     $title = "laporan";
    //     $model = new TransaksiModel();
    //     $laporan =  $model->idToData(TransaksiModel::where('status', 'terbayar')->get());
    //     return view("admin.laporan", compact("laporan", "title"));
    // }

    public function index(Request $request)
    {
        $title = "laporan";
        $model = new TransaksiModel();

        // Tambahkan seleksi berdasarkan tanggal jika ada
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $laporanQuery = TransaksiModel::where('status', 'terbayar');


        if ($tanggalAwal && $tanggalAkhir) {
            $laporanQuery->whereBetween('tanggal_pesan', [$tanggalAwal, $tanggalAkhir]);
        }

        $laporan = $model->idToData($laporanQuery->paginate(10)); // Sesuaikan jumlah data per halaman

        return view("admin.laporan", compact("laporan", "title"));
    }


    public function viewPdf(Request $request)
    {
        $model = new TransaksiModel();
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // dd($tanggalAwal, $tanggalAkhir);

        $laporanQuery = TransaksiModel::where('status', 'terbayar');

        // Tambahkan filter berdasarkan tanggal jika tanggal_awal dan tanggal_akhir ada
        if ($tanggalAwal && $tanggalAkhir) {
            $laporanQuery->whereBetween('tanggal_pesan', [$tanggalAwal, $tanggalAkhir]);
        }

        $laporan = $model->idToData($laporanQuery->get());

        $pdf = PDF::loadView(
            'admin.laporan_pdf',
            [
                'laporan' => $laporan,
                'tanggalAwal' => $tanggalAwal,
                'tanggalAkhir' => $tanggalAkhir,
            ]
        );
        return $pdf->download('laporan.pdf');
    }
}
