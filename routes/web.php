<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourManagementController;
use App\Http\Controllers\RouteManagementController;
use App\Http\Controllers\CarsManagementController;
use App\Http\Controllers\RouteTotalDetailsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\contact\ContactController;
use App\Http\Controllers\customize\CustomizeController;
use App\Http\Controllers\transfer\TransferController;
use App\Http\Controllers\tour\TourController;
use App\Http\Controllers\LineMessageController;

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

Route::get('/transfer-car', function () {
    return view('pages.detail-transfer-car.app');
});

Route::get('/', [HomeController::class, 'HomeIndex'])->name('HomeIndex');
Route::get('/tour-month/showall', [HomeController::class, 'TourMonthShowAll'])->name('TourMonthShowAll');
Route::get('/tour-month/detail/{id}', [HomeController::class, 'TourMonthDetails'])->name('TourMonthDetails');
Route::get('/tour-sightseeing/detail/{id}', [HomeController::class, 'TourSightSeeingDetails'])->name('TourSightSeeingDetails');
Route::get('/tour-sightseeing/showall', [HomeController::class, 'TourSightSeeingShowAll'])->name('TourSightSeeingShowAll');
Route::get('/tour-asia/detail/{id}', [HomeController::class, 'TourASIADetails'])->name('TourASIADetails');
Route::get('/tour-asia/showall', [HomeController::class, 'TourASIAShowAll'])->name('TourASIAShowAll');

Route::get('/contact', [ContactController::class, 'ContactPage'])->name('ContactPage');

Route::get('/customize', [CustomizeController::class, 'CustomizePage'])->name('CustomizePage');

Route::get('/transfer', [TransferController::class, 'TransferPage'])->name('TransferPage');
Route::get('/transfer/list-car', [TransferController::class, 'ListCar'])->name('ListCar');
Route::get('/transfer/list-car/details/{id}', [TransferController::class, 'ListCarDetail'])->name('ListCarDetail');

Route::get('/tour-all', [TourController::class, 'TourAll'])->name('TourAll');

//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//line messger
Route::post('/send-line', [LineMessageController::class, 'send'])->name('line.send');

Route::middleware(['check.loggedin'])->group(function () {
    //TourSectionManagement
    Route::get('/TourSectionManagement/page', [TourManagementController::class, 'TourSectionManagement'])->name('TourSectionManagement');
    Route::post('/TourSectionManagement/create', [TourManagementController::class, 'CreateNewTourSection'])->name('CreateNewTourSection');
    Route::delete('/TourSectionManagement/delete/{id}', [TourManagementController::class, 'DeleteTourSection'])->name('DeleteTourSection');

    //TourlistSection
    Route::get('/TourSectionManagement/TourlistSection/{id}', [TourManagementController::class, 'TourlistSection'])->name('TourlistSection');
    Route::post('/TourSectionManagement/TourlistSection/create/{id}', [TourManagementController::class, 'CreateNewTour'])->name('CreateNewTour');
    Route::delete('/TourSectionManagement/TourlistSection/delete/{id}', [TourManagementController::class, 'DeleteTour'])->name('DeleteTour');

    //RouteManagement
    Route::get('/ProvinceManagement/page', [RouteManagementController::class, 'ProvinceManagement'])->name('ProvinceManagement');
    Route::post('/ProvinceManagement/create', [RouteManagementController::class, 'CreateNewProvince'])->name('CreateNewProvince');
    Route::delete('/ProvinceManagement/delete/{id}', [RouteManagementController::class, 'deleteProvince'])->name('deleteProvince');

    //RoutesMainManagement
    Route::get('/ProvinceManagement/RoutesMainManagement/Routes/{id}', [RouteManagementController::class, 'RoutesMainManagement'])->name('RoutesMainManagement');
    Route::post('/ProvinceManagement/RoutesMainManagement/Routes/create/{id}', [RouteManagementController::class, 'CreateNewRoutes'])->name('CreateNewRoutes');
    Route::delete('/ProvinceManagement/RoutesMainManagement/Routes/delete/{id}', [RouteManagementController::class, 'deleteRoute'])->name('deleteRoute');

    //RoutesDetails
    Route::get('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/{id}', [RouteManagementController::class, 'RoutesDetails'])->name('RoutesDetails');
    Route::post('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/create/{id}', [RouteManagementController::class, 'CreateNewRoutesDetails'])->name('CreateNewRoutesDetails');
    Route::delete('/ProvinceManagement/RoutesMainManagement/Routes/RoutesDetails/delete/{id}', [RouteManagementController::class, 'deleteRouteDetail'])->name('deleteRouteDetail');

    //CarsManagement
    Route::get('/CarsManagement/page', [CarsManagementController::class, 'CarBrandsManagement'])->name('CarBrandsManagement');
    Route::post('/CarsManagement/create', [CarsManagementController::class, 'CreateNewCarBrands'])->name('CreateNewCarBrands');
    Route::delete('/CarsManagement/delete/{id}', [CarsManagementController::class, 'deleteCarBrand'])->name('deleteCarBrand');

    //CarModelManagement
    Route::get('/CarsManagement/CarModelManagement/{id}', [CarsManagementController::class, 'CarModelManagement'])->name('CarModelManagement');
    Route::post('/CarsManagement/CarModelManagement/create/{id}', [CarsManagementController::class, 'CreateNewCarModel'])->name('CreateNewCarModel');
    Route::delete('/CarsManagement/CarModelManagement/delete/{id}', [CarsManagementController::class, 'deleteCarModel'])->name('deleteCarModel');

    //RouteTotalDetails
    Route::get('/RouteTotalDetails/page', [RouteTotalDetailsController::class, 'RouteTotalDetails'])->name('RouteTotalDetails');
    Route::post('/RouteTotalDetails/create', [RouteTotalDetailsController::class, 'CreateNewRouteTotalDetails'])->name('CreateNewRouteTotalDetails');
    Route::delete('/RouteTotalDetails/create/{id}', [RouteTotalDetailsController::class, 'deleteRouteTotal'])->name('deleteRouteTotal');

});
