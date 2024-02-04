<?php

namespace App\Http\Controllers;

use App\Models\TestimoniModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $testimoniModel = TestimoniModel::all();
        $testimoniModel = TestimoniModel::where('deskripsi', '!=', '')
            ->whereNotNull('deskripsi')
            ->get();
        return view('home', compact('testimoniModel'));
    }
}
