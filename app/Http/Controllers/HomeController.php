<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourSection;
use App\Models\Tour;
use App\Models\TourHighlight;
use App\Models\TourImage;
use App\Models\TourPdf;

class HomeController extends Controller
{
    //
    public function HomeIndex()
    {
        $toursections_month = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'MONTH');
            })
            ->take(8)
            ->get();

        $toursections_sightseeing = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'SIGHTSEEING');
            })
            ->take(8)
            ->get();

        return view('pages.home.app', compact('toursections_month','toursections_sightseeing'));
    }

    public function TourDetails($id)
    {
        $tourdetails = Tour::with(['highlights', 'images', 'pdfs'])->findOrFail($id);

        return view('pages.detail-tour-month.app', compact('tourdetails'));
    }

    public function TourShowAll()
    {
        $toursections = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'MONTH');
            })->get();

        return view('pages.tour-all-month.app', compact('toursections'));
    }
}
