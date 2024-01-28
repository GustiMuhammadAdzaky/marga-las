<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\AtmModel;

class AtmController extends Controller
{
    public function form()
    {
        $title = "No Rekening";
        $noRek = AtmModel::all()[0]->no_rek;
        return view('admin.atm', compact('title', 'noRek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rek' => 'required', // Validasi file gambar
        ]);

        $atm = AtmModel::all()[0];
        $atm->no_rek = $request->input("no_rek");
        $atm->save();


        return redirect()->route('atm.index')->with('status', 'Nomor rekening barusaja diubah');
    }
}
