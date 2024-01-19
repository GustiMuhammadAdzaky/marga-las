<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\KontakModel;

class KontakAdminController extends Controller
{
    public function index()
    {
        $kontakModel = KontakModel::all();
        $title = "Kontak";
        return view("admin.kontak", compact("kontakModel", "title"));
    }


    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string',
            'email' => 'required',
            'pesan' => 'required', // Validasi untuk JSON
        ]);



        KontakModel::create([
            'nama' => $request->input('nama'),
            'nomor' => $request->input('nomor'),
            'email' => $request->input("email"),
            'pesan' => $request->input("pesan"),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kontak')->with('status', 'Pesan Anda Berhasil Kami Kirimkan');
    }

    public function destroy($id)
    {

        $kontak = KontakModel::findOrFail($id);

        // Hapus data dari database
        $kontak->delete();

        return redirect()->route('kontak.admin')->with('status', 'Data berhasil dihapus');
    }
}
