<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\GaleriModel;
use Illuminate\Support\Facades\Storage;

class GaleriAdminController extends Controller
{
    public function index()
    {
        $title = "galeri";
        $model = GaleriModel::all();
        return view("admin.galeri", compact("title", "model"));
    }


    public function tambahData()
    {
        // return "cek";
        $title = "galeri";
        $model = GaleriModel::all();
        return view("admin.tambah_galeri", compact("title", "model"));
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');

        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
        ]);

        // Mengonversi JSON menjadi array

        $gambar = $request->file('gambar');
        $namaFile = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public\galeri', $namaFile);

        // Menyimpan data ke dalam database
        GaleriModel::create([
            'gambar' => $namaFile,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('galeri.index')->with('status', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $galeri = GaleriModel::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($galeri->gambar) {
            Storage::delete('public/galeri/' . $galeri->gambar);
        }
        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('galeri.index')->with('status', 'Data berhasil dihapus');
    }
}
