<?php

namespace App\Http\Controllers;

use App\Models\AtmModel;
use App\Models\LayananModel;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class TransaksiController extends Controller
{


    public function index()
    {
        $model = new TransaksiModel;

        $transaksiBelumTerbayarKredit = TransaksiModel::where('status', 'belum_terbayar')
            ->where('tipe_pembayaran', 'kredit')
            ->get();

        // dd($transaksiBelumTerbayarTransfer);
        $transaksiModels = $model->idToData(TransaksiModel::where('user_id', Auth::user()->id)->get());
        return view("transaksi", compact("transaksiModels"));
    }




    public function checkout(Request $request)
    {

        $request->validate([
            'tipe_pembayaran' => 'required',
        ]);




        TransaksiModel::create([
            "user_id" => Auth::user()->id,
            "transaksi_data" => $request->input('transaksi_data'),
            "total_harga" => $request->input('total_harga'),
            "tanggal_pesan" => $request->input('tanggal_pesan'),
            "tipe_pembayaran" => $request->input("tipe_pembayaran"),
        ]);


        \Cart::clear();


        // Redirect atau tampilkan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil!');
    }

    public function form($id)
    {
        $noRek = AtmModel::all()[0]->no_rek;
        $transaksi = TransaksiModel::find($id);
        return view('bukti_transfer', compact("transaksi", "noRek"));
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $transaksi = TransaksiModel::find($id);

        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($transaksi->gambar) {
                Storage::delete('public/transfer/' . $transaksi->gambar);
            }

            // Upload and save the new image
            $foto = $request->file('gambar');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/transfer', $nama_foto);
            $transaksi->gambar = $nama_foto;
        }

        $transaksi->status = "menunggu";

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('status', 'Menunggu Konfirmasi Pemabayaran dari admin');
    }

    // public function edit($id)
    // {
    //     // Fetch the LayananModel instance for the given ID
    //     $layanan = LayananModel::find($id);
    //     $kategori = KategoriLayananAdminModel::all();

    //     // Pass the LayananModel instance to the view for editing
    //     return view('admin.edit_layanan', compact("layanan", "kategori"));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_alat' => 'required|string',
    //         'deskripsi_layanan' => 'required|string',
    //         'harga_layanan' => 'required',
    //     ]);

    //     $layanan = LayananModel::find($id);
    //     $layanan->nama_alat = $request->input('nama_alat');
    //     $layanan->deskripsi_layanan = $request->input('deskripsi_layanan');
    //     $layanan->harga_layanan = $request->input("harga_layanan");
    //     $layanan->kategori_id = $request->input("kategori_id");

    //     // Check if a new image is uploaded
    //     if ($request->hasFile('gambar')) {
    //         // Delete old image if it exists
    //         if ($layanan->gambar) {
    //             Storage::delete('public/gambar/' . $layanan->gambar);
    //         }

    //         // Upload and save the new image
    //         $foto = $request->file('gambar');
    //         $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
    //         $foto->storeAs('public/gambar', $nama_foto);
    //         $layanan->gambar = $nama_foto;
    //     }

    //     $layanan->save();

    //     return redirect()->route('layanan_admin')->with('status', 'Data berhasil diubah');
    // }
}
