<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Mail\ReminderEmail;
use App\Models\LayananModel;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class TransaksiAdminController extends Controller
{


    public function index()
    {
        $model = new TransaksiModel();
        $transaksiModels = $model->idToData(TransaksiModel::all());
        $title = "Kelola Transaksi";
        return view("admin.transaksi", compact("title", "transaksiModels"));
    }





    public function updateStatus(Request $request)
    {
        try {
            $transaksiId = $request->input('transaksiId');
            $selectedStatus = $request->input('selectedStatus');
            $transaksi = TransaksiModel::find($transaksiId);


            if (!$transaksi) {
                return redirect()->route('transaksi.admin')->with('status', 'Transaksi tidak ditemukan.');
            }
            $transaksi->status = $selectedStatus;

            $transaksi->save();
            return redirect()->route('transaksi.admin')->with('status', 'Data Berhasil Diperbaharui');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.admin')->with('status', 'Data Berhasil Diperbaharui');
        }
    }
}
