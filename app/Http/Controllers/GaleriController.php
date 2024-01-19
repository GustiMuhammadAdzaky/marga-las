<?php

namespace App\Http\Controllers;

use App\Models\GaleriModel;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriModel = GaleriModel::all();
        return view('galeri', compact("galeriModel"));
    }
}
