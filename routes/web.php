<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::view('master', 'Layouts.master');

Route::resource('devices', DeviceController::class);
Route::resource('products', ProductController::class);
Route::resource('students', StudentController::class);

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        // Route::resource('brands', BrandController::class);
        // Route::resource('cars', CarController::class);
    });