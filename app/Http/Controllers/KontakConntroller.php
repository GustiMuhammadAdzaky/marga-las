<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kontakConntroller extends Controller
{
    public function index()
    {
        return view("kontak");
    }
}
