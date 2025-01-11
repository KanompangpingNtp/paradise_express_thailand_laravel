<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourManagementController extends Controller
{
    //
    public function TourSectionManagement ()
    {
        return view('admin.tour_management.tour_section_management.tour_section_management');
    }
}
