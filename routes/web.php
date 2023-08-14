<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('','App\Http\Controllers\FrontEndController');

Route::resource('main','App\Http\Controllers\MainCategoryController');

Route::resource('sub','App\Http\Controllers\SubCategoryController');

Route::resource('manufacturer','App\Http\Controllers\ManufacturerController');