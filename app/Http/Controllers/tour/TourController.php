<?php

namespace App\Http\Controllers\tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function TourAll ()
    {
        return view('pages.all-tour.app');
    }
}
