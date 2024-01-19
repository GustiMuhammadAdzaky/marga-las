<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\GaleriModel;
use Barryvdh\DomPDF\Facade\Pdf;

class FakturController extends Controller
{
    public function form()
    {
        $noInvoice = rand(100000, 999999);
        $title = "Faktur";
        return view('admin.faktur', compact("title", "noInvoice"));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        // dd($data);

        $pdf = PDF::loadView('admin.faktur_pdf', ['data' => $data]);
        return $pdf->download('faktur.pdf');
    }
}
