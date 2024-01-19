<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\KategoriLayananAdminModel;

class KategoriLayananAdminController extends Controller
{
    public function index()
    {
        $kategoriLayanan = KategoriLayananAdminModel::all();
        $title = "Kategori Layanan";
        return view("admin.kategori_layanan", compact("title", "kategoriLayanan"));
    }

    public function tambahData()
    {
        $title = "Tambah data Kategori Layanan";
        return view("admin.tambah_data_kategori_layanan", compact("title"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriLayananAdminModel::create([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kategori_admin')->with('status', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {

        $kategori = KategoriLayananAdminModel::find($id);

        return view('admin.edit_kategori_layanan_admin', ['kategori' => $kategori]);
    }
    public function update(Request $request, $id)
    {


        $request->validate([
            'nama_kategori' => 'required|string',
        ]);
        $kategori = KategoriLayananAdminModel::find($id);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();
        return redirect()->route('kategori_admin')->with('status', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = KategoriLayananAdminModel::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori_admin')->with('status', 'Data berhasil dihapus');
    }
}
