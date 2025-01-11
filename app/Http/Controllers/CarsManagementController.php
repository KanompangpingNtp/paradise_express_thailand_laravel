<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarImage;

class CarsManagementController extends Controller
{
    //
    public function CarBrandsManagement()
    {
        $carbrand = CarBrand::all();

        return view('admin.transfer_management.car_brands_management.car_brands_management', compact('carbrand'));
    }

    public function CreateNewCarBrands(Request $request)
    {
        $request->validate([
            'car_brand_name' => 'required|string|max:255',
        ]);

        $carbrand = CarBrand::create([
            'car_brand_name' => $request->car_brand_name,
        ]);

        return redirect()->back()->with('success', 'CarBrands created successfully.');
    }

    public function CarModelManagement($id)
    {
        $carbrand = CarBrand::findOrFail($id);

        $carmodel = CarModel::where('car_brand_id', $id)->get();

        return view('admin.transfer_management.car_model_management.car_model_management', compact('carbrand','carmodel'));
    }

    public function CreateNewCarModel(Request $request, $carmodelId)
    {
        $request->validate([
            'car_model_name' => 'required|string|max:255',
            'car_images_file.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        // dd($request);

        $carmodel = CarModel::create([
            'car_brand_id' => $carmodelId,
            'car_model_name' => $request->car_model_name,
        ]);

        if ($request->hasFile('car_images_file')) {
            foreach ($request->file('car_images_file') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('car_images_file', $filename, 'public');

                CarImage::create([
                    'car_model_id' => $carmodel->id,
                    'car_images_file' => $path,
                    'car_images_status' => 1,
                ]);
            }
        }

        return redirect()->back()->with('success', 'CarModel created successfully.');
    }
}
