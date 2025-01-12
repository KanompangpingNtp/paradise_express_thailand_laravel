<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\CarBrand;
use App\Models\RouteTotal;

class RouteTotalDetailsController extends Controller
{
    //
    // public function RouteTotalDetails()
    // {
    //     return view('admin.transfer_management.connect_line.connect_line');
    // }
    public function RouteTotalDetails()
    {
        $provinces = Province::with(['routes.routeDetails'])->get();
        $carBrands = CarBrand::with('carModels')->get();
        $routeTotals = RouteTotal::with([
            'routeDetail.route.province', // แก้จาก routeProvince เป็น province
            'carModel.carBrand',
        ])->get();

        return view('admin.transfer_management.connect_line.connect_line', compact('provinces', 'carBrands', 'routeTotals'));
    }

    public function CreateNewRouteTotalDetails(Request $request)
    {
        $request->validate([
            'route_detail_id' => 'required|exists:route_details,id',
            'car_model_id' => 'required|exists:car_models,id',
            'data_price' => 'required|integer|min:0',
        ]);

        // dd($request);

        RouteTotal::create([
            'route_detail_id' => $request->route_detail_id,
            'car_model_id' => $request->car_model_id,
            'data_price' => $request->data_price,
        ]);

        return redirect()->back()->with('success', 'Route Total created successfully.');
    }
}
