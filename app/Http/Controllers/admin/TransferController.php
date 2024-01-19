<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Models\TransferModel;

class TransferController extends Controller
{
    public function index()
    {
        $title = "Data Transfer";
        $transferModel = TransferModel::all();
        return view("admin.transfer", compact("transferModel", "title"));
    }
}
