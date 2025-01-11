<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourManagementController;
use App\Http\Controllers\RouteManagementController;
use App\Http\Controllers\CarsManagementController;
use App\Http\Controllers\RouteTotalDetailsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//TourSectionManagement
Route::get('/TourSectionManagement/page', [TourManagementController::class, 'TourSectionManagement'])->name('TourSectionManagement');

//RouteManagement
Route::get('/ProvinceManagement/page', [RouteManagementController::class, 'ProvinceManagement'])->name('ProvinceManagement');
Route::post('/ProvinceManagement/create', [RouteManagementController::class, 'CreateNewProvince'])->name('CreateNewProvince');

Route::get('/ProvinceManagement/RoutesMainManagement/Routes/{id}', [RouteManagementController::class, 'RoutesMainManagement'])->name('RoutesMainManagement');
Route::post('/ProvinceManagement/RoutesMainManagement/Routes/create/{id}', [RouteManagementController::class, 'CreateNewRoutes'])->name('CreateNewRoutes');

Route::get('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/{id}', [RouteManagementController::class, 'RoutesDetails'])->name('RoutesDetails');
Route::post('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/create/{id}', [RouteManagementController::class, 'CreateNewRoutesDetails'])->name('CreateNewRoutesDetails');

//CarsManagement
Route::get('/CarsManagement/page', [CarsManagementController::class, 'CarBrandsManagement'])->name('CarBrandsManagement');
Route::post('/CarsManagement/create', [CarsManagementController::class, 'CreateNewCarBrands'])->name('CreateNewCarBrands');

Route::get('/CarsManagement/CarModelManagement/{id}', [CarsManagementController::class, 'CarModelManagement'])->name('CarModelManagement');
Route::post('/CarsManagement/CarModelManagement/create/{id}', [CarsManagementController::class, 'CreateNewCarModel'])->name('CreateNewCarModel');

//RouteTotalDetails
Route::get('/RouteTotalDetails/page', [RouteTotalDetailsController::class, 'RouteTotalDetails'])->name('RouteTotalDetails');
Route::post('/RouteTotalDetails/create', [RouteTotalDetailsController::class, 'CreateNewRouteTotalDetails'])->name('CreateNewRouteTotalDetails');
