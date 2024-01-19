<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\KategoriLayananAdminModel;
use App\Models\LayananModel;

use Illuminate\Support\Facades\Storage;

class LayananAdminController extends Controller
{
    public function index()
    {
        $LayananModel = LayananModel::all();
        $title = "Layanan";

        return view('admin.layanan', compact('title', 'LayananModel'));
    }


    public function tambahData(Request $request)
    {
        $title = "Tambah Data Layanan";
        $kategori = KategoriLayananAdminModel::all();
        return view("admin.tambah_data_layanan", compact("title", "kategori"));
    }

    public function store(Request $request)
    {
        // dd($request->input());
        // Validasi input
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'deskripsi_layanan' => 'required|string',
            'harga_layanan' => 'required',
            'kategori_id' => 'required', // Validasi untuk JSON
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
        ]);

        // Mengonversi JSON menjadi array

        $gambar = $request->file('gambar');
        $namaFile = time() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public\gambar', $namaFile);

        // Menyimpan data ke dalam database
        LayananModel::create([
            'nama_alat' => $request->input('nama_alat'),
            'deskripsi_layanan' => $request->input('deskripsi_layanan'),
            'harga_layanan' => $request->input("harga_layanan"),
            'kategori_id' => $request->input("kategori_id"),
            // C:\xampp\htdocs\marga-las\storage\app\public\gambar
            'gambar' => $namaFile,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('layanan_admin')->with('status', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        // Fetch the LayananModel instance for the given ID
        $layanan = LayananModel::find($id);
        $kategori = KategoriLayananAdminModel::all();

        // Pass the LayananModel instance to the view for editing
        return view('admin.edit_layanan', compact("layanan", "kategori"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat' => 'required|string',
            'deskripsi_layanan' => 'required|string',
            'harga_layanan' => 'required',
        ]);

        $layanan = LayananModel::find($id);
        $layanan->nama_alat = $request->input('nama_alat');
        $layanan->deskripsi_layanan = $request->input('deskripsi_layanan');
        $layanan->harga_layanan = $request->input("harga_layanan");
        $layanan->kategori_id = $request->input("kategori_id");

        // Check if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($layanan->gambar) {
                Storage::delete('public/gambar/' . $layanan->gambar);
            }

            // Upload and save the new image
            $foto = $request->file('gambar');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/gambar', $nama_foto);
            $layanan->gambar = $nama_foto;
        }

        $layanan->save();

        return redirect()->route('layanan_admin')->with('status', 'Data berhasil diubah');
    }


    public function destroy($id)
    {
        $layanan = LayananModel::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($layanan->gambar) {
            Storage::delete('public/gambar/' . $layanan->gambar);
        }
        // Hapus data dari database
        $layanan->delete();

        return redirect()->route('layanan_admin')->with('status', 'Data berhasil dihapus');
    }
}
