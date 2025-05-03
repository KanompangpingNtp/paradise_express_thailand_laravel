<?php

namespace App\Http\Controllers\transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RouteTotal;

class TransferController extends Controller
{
    public function TransferPage()
    {
        $routeTotals = RouteTotal::with([
            'routeDetail.route.province', // แก้จาก routeProvince เป็น province
            'carModel.carBrand'
        ])->get();

        return view('pages.transfer.app', compact('routeTotals'));
    }

    public function ListCar(Request $request)
    {
        $routeId = $request->query('route_id');

        $routeTotal = RouteTotal::with([
            'carModel.carBrand',
            'carModel.carImages',
            'routeDetail.route.province'
        ])->findOrFail($routeId);

        return view('pages.transfer-all.app', compact('routeTotal'));
    }

    public function ListCarDetail(Request $request, $id)
    {
        $routeTotal = RouteTotal::with([
            'carModel.carBrand',
            'carModel.carImages',
            'routeDetail.route.province'
        ])->findOrFail($id);

        return view('pages.transfer-detail.app', compact('routeTotal'));
    }
}
