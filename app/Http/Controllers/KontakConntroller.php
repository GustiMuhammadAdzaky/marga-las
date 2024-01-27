<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakConntroller extends Controller
{
    public function index()
    {
        return view("kontak");
    }
}
