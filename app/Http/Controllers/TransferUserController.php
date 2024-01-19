<?php

namespace App\Http\Controllers;

use App\Models\TransferModel;
use Illuminate\Http\Request;

class TransferUserController extends Controller
{
    public function form()
    {
        $title = "Transfer";
        return view("transfer", compact("title"));
    }

    public function store(Request $request)
    {

        $request->validate([
            'transaksi_id' => 'required',
            'nama_pembeli' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
        ]);


        // Mengonversi JSON menjadi array

        $gambar = $request->file('gambar');
        $namaFile = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public\transfer', $namaFile);

        // Menyimpan data ke dalam database
        TransferModel::create([
            'transaksi_id' => $request->input('transaksi_id'),
            'nama_pembeli' => $request->input('nama_pembeli'),
            'gambar' => $namaFile,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('transfer.form')->with('status', 'Form berhasil Kami Kirim. Lihat Terus Status Transaksi Anda');
    }
}
