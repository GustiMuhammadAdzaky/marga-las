<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapthaController extends Controller
{
    public function reload()
    {
        $captcha = captcha_img('math');
        return response()->json(['captcha' => $captcha]);
    }
}
