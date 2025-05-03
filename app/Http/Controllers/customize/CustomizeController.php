<?php

namespace App\Http\Controllers\customize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomizeController extends Controller
{
    public function CustomizePage ()
    {
        return view('pages.customize.app');
    }
}
