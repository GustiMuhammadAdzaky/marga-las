<?php

namespace App\Http\Controllers;

use App\Models\TestimoniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function form()
    {
        $title = "Testimoni";
        $data = TestimoniModel::find(Auth::user()->id);
        return view("testimoni_form", compact('title', 'data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'rate' => 'required',
            'deskripsi' => 'required'
        ]);



        $testi = TestimoniModel::find($request->input('user_id'));
        $testi->rate = $request->input('rate');
        $testi->deskripsi = $request->input('deskripsi');
        $testi->save();


        // Redirect atau tampilkan pesan sukses
        return redirect()->route('home')->with('success', 'Ulasan anda sudah kami simpan');
    }
}
