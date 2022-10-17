<?php

use Illuminate\Support\Facades\Route;

// Controller Dashboard
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

// Controller Dashboard
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\PDFController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Default
Route::get('/', function () {
    return view('pages.index');
});

//Login
Route::get('/login', function () {
    Auth::logout();
    return view('login.index');
});

Route::post('/login', [LoginController::class, 'authenticate'])->middleware(
    'guest'
);

// DASHBOARD
Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboards', 'index');
    // Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});



// Info HRD
Route::controller(PageController::class)->group(function () {
    Route::get('/pages/example', 'example');
    Route::get('/pages', 'index');
    Route::get('/pages/resign', 'resign');
    Route::post('/pages/resign', 'Post');
    Route::get('/pages/resignpdf', 'Resignpdf');
    Route::post('/pages/apigetemployee', 'getemployee')->name('apigetemployee');
    Route::post('/pages/apigetresign', 'apigetresign')->name('apigetresign');
});