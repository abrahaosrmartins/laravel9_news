<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Routes from same controller, that, for some reason, you don't want to use resource:
// 8.x version: Still supported
//Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
//Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');

//: 9.x version:
Route::controller(RestaurantController::class)
    ->prefix('restaurants')
    ->name('restaurants')
    ->group(function (){
        Route::get('/', [RestaurantController::class, 'index'])->name('index');
        Route::get('/create', [RestaurantController::class, 'create'])->name('create');
    });
