<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Route;
use App\Models\RouteDetail;

class RouteManagementController extends Controller
{
    //
    public function ProvinceManagement()
    {
        $provinces = Province::all();

        return view('admin.transfer_management.province_management.province_management', compact('provinces'));
    }

    public function CreateNewProvince(Request $request)
    {
        $request->validate([
            'province_name' => 'required|string|max:255',
        ]);

        $province = Province::create([
            'province_name' => $request->province_name,
        ]);

        return redirect()->back()->with('success', 'Province created successfully.');
    }

    public function RoutesMainManagement($id)
    {
        $province = Province::findOrFail($id);

        $routes = Route::where('province_id', $id)->get();

        return view('admin.transfer_management.routes_main_management.routes_main_management', compact('province','routes'));
    }

    public function CreateNewRoutes(Request $request, $provinceId)
    {
        $request->validate([
            'route_name' => 'required|string|max:255',
        ]);

        $route = Route::create([
            'province_id' => $provinceId,
            'route_name' => $request->route_name,
        ]);

        return redirect()->back()->with('success', 'Route created successfully.');
    }

    public function RoutesDetails($id)
    {
        $route = Route::findOrFail($id);

        $routes_details = RouteDetail::where('route_id', $id)->get();

        return view('admin.transfer_management.route_details.route_details', compact('route','routes_details'));
    }

    public function CreateNewRoutesDetails(Request $request, $routeId)
    {
        $request->validate([
            'route_detail_name' => 'required|string|max:255',
        ]);

        $route = RouteDetail::create([
            'route_id' => $routeId,
            'route_detail_name' => $request->route_detail_name,
        ]);

        return redirect()->back()->with('success', 'RoutesDetails created successfully.');
    }
}
