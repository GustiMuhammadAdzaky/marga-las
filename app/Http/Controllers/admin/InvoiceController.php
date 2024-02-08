<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\ReminderEmail;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Svg\Tag\Rect;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     $title = "Invoice";
    //     $model = new TransaksiModel();
    //     $laporanQuery = $model->idToData(TransaksiModel::where("tipe_pembayaran", "kredit")->get());

    //     $tanggalAwal = $request->input('tanggal_awal');
    //     $tanggalAkhir = $request->input('tanggal_akhir');


    //     if ($tanggalAwal && $tanggalAkhir) {
    //         $laporanQuery->whereBetween('tanggal_pesan', [$tanggalAwal, $tanggalAkhir]);
    //     }

    //     $belumTerbayar = $model->idToData($laporanQuery->paginate(10));

    //     return view("admin.invoice", compact("title", "belumTerbayar"));
    // }

    public function index(Request $request)
    {
        $title = "Invoice";
        $model = new TransaksiModel();

        $laporanQuery = TransaksiModel::where("tipe_pembayaran", "kredit");

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $tanggalAkhir = Carbon::parse($tanggalAkhir)->addDay();

        if ($tanggalAwal && $tanggalAkhir) {
            $laporanQuery->whereBetween('tanggal_pesan', [$tanggalAwal, $tanggalAkhir]);
        }

        $belumTerbayar = $model->idToData($laporanQuery->paginate(10));

        return view("admin.invoice", compact("title", "belumTerbayar"));
    }


    public function viewPdf(Request $request)
    {
        $model = new TransaksiModel();
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $laporanQuery = TransaksiModel::where("tipe_pembayaran", "kredit");

        $pageTanggalAkhir = Carbon::parse($tanggalAkhir)->addDay();

        if ($tanggalAwal && $tanggalAkhir) {
            $laporanQuery->whereBetween('tanggal_pesan', [$tanggalAwal, $pageTanggalAkhir]);
        }

        $laporan = $model->idToData($laporanQuery->get());

        $pdf = PDF::loadView(
            'admin.laporan_kredit_pdf',
            [
                'laporan' => $laporan,
                'tanggalAwal' => $tanggalAwal,
                'tanggalAkhir' => $tanggalAkhir,
            ]
        );
        return $pdf->download('laporan_kredit.pdf');
    }

    public function store(Request $request)
    {
        $user_id = $request->input("user_id");

        // Mendapatkan data user berdasarkan user_id
        $user = User::find($user_id);

        $model = new TransaksiModel();

        if ($user) {
            // Mendapatkan transaksi yang belum terbayar untuk user tertentu
            $transaksis = $model->idToData(TransaksiModel::where('user_id', $user_id)
                ->where('status', 'belum_terbayar')
                ->get());
            foreach ($transaksis as $transaksi) {
                $this->sendReminderEmail($transaksi, $user->email);
            }
            return redirect()->back()->with('success', 'Email berhasil dikirim untuk transaksi belum terbayar.');
        } else {
            // Tambahkan pesan error atau redirect ke halaman tertentu jika user tidak ditemukan
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
    }

    protected function sendReminderEmail($transaksi, $email)
    {
        Mail::to($email)->send(new ReminderEmail($transaksi));
    }
}
