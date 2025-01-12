<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourManagementController;
use App\Http\Controllers\RouteManagementController;
use App\Http\Controllers\CarsManagementController;
use App\Http\Controllers\RouteTotalDetailsController;
use App\Http\Controllers\AuthController;

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
    return view('pages.transfer-all.app');
});

//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['check.loggedin'])->group(function () {
    //TourSectionManagement
    Route::get('/TourSectionManagement/page', [TourManagementController::class, 'TourSectionManagement'])->name('TourSectionManagement');
    Route::post('/TourSectionManagement/create', [TourManagementController::class, 'CreateNewTourSection'])->name('CreateNewTourSection');

    //TourlistSection
    Route::get('/TourSectionManagement/TourlistSection/{id}', [TourManagementController::class, 'TourlistSection'])->name('TourlistSection');
    Route::post('/TourSectionManagement/TourlistSection/create/{id}', [TourManagementController::class, 'CreateNewTour'])->name('CreateNewTour');

    //RouteManagement
    Route::get('/ProvinceManagement/page', [RouteManagementController::class, 'ProvinceManagement'])->name('ProvinceManagement');
    Route::post('/ProvinceManagement/create', [RouteManagementController::class, 'CreateNewProvince'])->name('CreateNewProvince');

    //RoutesMainManagement
    Route::get('/ProvinceManagement/RoutesMainManagement/Routes/{id}', [RouteManagementController::class, 'RoutesMainManagement'])->name('RoutesMainManagement');
    Route::post('/ProvinceManagement/RoutesMainManagement/Routes/create/{id}', [RouteManagementController::class, 'CreateNewRoutes'])->name('CreateNewRoutes');

    //RoutesDetails
    Route::get('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/{id}', [RouteManagementController::class, 'RoutesDetails'])->name('RoutesDetails');
    Route::post('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/create/{id}', [RouteManagementController::class, 'CreateNewRoutesDetails'])->name('CreateNewRoutesDetails');

    //CarsManagement
    Route::get('/CarsManagement/page', [CarsManagementController::class, 'CarBrandsManagement'])->name('CarBrandsManagement');
    Route::post('/CarsManagement/create', [CarsManagementController::class, 'CreateNewCarBrands'])->name('CreateNewCarBrands');

    //CarModelManagement
    Route::get('/CarsManagement/CarModelManagement/{id}', [CarsManagementController::class, 'CarModelManagement'])->name('CarModelManagement');
    Route::post('/CarsManagement/CarModelManagement/create/{id}', [CarsManagementController::class, 'CreateNewCarModel'])->name('CreateNewCarModel');

    //RouteTotalDetails
    Route::get('/RouteTotalDetails/page', [RouteTotalDetailsController::class, 'RouteTotalDetails'])->name('RouteTotalDetails');
    Route::post('/RouteTotalDetails/create', [RouteTotalDetailsController::class, 'CreateNewRouteTotalDetails'])->name('CreateNewRouteTotalDetails');
});
