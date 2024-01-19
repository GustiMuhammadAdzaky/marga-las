<?php

namespace App\Http\Controllers;

use App\Models\LayananModel;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{


    public function index()
    {
        $model = new TransaksiModel;
        $transaksiModels = $model->idToData(TransaksiModel::where('user_id', Auth::user()->id)->get());
        return view("transaksi", compact("transaksiModels"));
    }




    public function checkout(Request $request)
    {

        TransaksiModel::create([
            "user_id" => Auth::user()->id,
            "transaksi_data" => $request->input('transaksi_data'),
            "total_harga" => $request->input('total_harga'),
            "tanggal_pesan" => $request->input('tanggal_pesan'),
        ]);


        \Cart::clear();


        // Redirect atau tampilkan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input("id");
        $transaksi = TransaksiModel::findOrFail($id);

        // Hapus data dari database
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('status', 'Data transaksi anda berhasil dihapus');
    }
}
