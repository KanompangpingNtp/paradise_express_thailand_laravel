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


        $toursections_asia = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'ASIA');
            })
            ->take(8)
            ->get();

        return view('pages.home.app', compact('toursections_month', 'toursections_sightseeing','toursections_asia'));
    }

    public function TourMonthDetails($id)
    {
        $tourdetails = Tour::with(['highlights', 'images', 'pdfs'])->findOrFail($id);

        return view('pages.detail-tour-month.app', compact('tourdetails'));
    }

    public function TourMonthShowAll()
    {
        $toursections = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'MONTH');
            })->get();

        return view('pages.tour-all-month.app', compact('toursections'));
    }

    public function TourSightSeeingDetails($id)
    {
        $tourdetails = Tour::with(['highlights', 'images', 'pdfs'])->findOrFail($id);

        return view('pages.detail-tour-sightseeing.app', compact('tourdetails'));
    }

    public function TourSightSeeingShowAll()
    {
        $toursections = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'SIGHTSEEING');
            })->get();

        return view('pages.tour-all-sightseeing.app', compact('toursections'));
    }

    public function TourASIADetails($id)
    {
        $tourdetails = Tour::with(['highlights', 'images', 'pdfs'])->findOrFail($id);

        return view('pages.detail-tour-asia.app', compact('tourdetails'));
    }

    public function TourASIAShowAll()
    {
        $toursections = Tour::with(['highlights', 'images'])
            ->whereHas('tourSection', function ($query) {
                $query->where('tour_section_name', 'ASIA');
            })->get();

        return view('pages.tour-all-asia.app', compact('toursections'));
    }
}
