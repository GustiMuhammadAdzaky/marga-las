<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\ReminderEmail;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {
        $title = "Invoice";
        $model = new TransaksiModel();
        $belumTerbayar = $model->idToData(TransaksiModel::where("status", "belum_terbayar")->get());

        return view("admin.invoice", compact("title", "belumTerbayar"));
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
