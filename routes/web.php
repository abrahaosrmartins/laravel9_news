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

/*
 Routes de um mesmo controller que, por algum motivo, não usam resources
 Sintaxe separada:
 Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
 Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
*/


/*
 * Versão 9.x:
 */
Route::controller(RestaurantController::class)
    ->prefix('restaurants')
    ->name('restaurants')
    ->group(function (){
        Route::get('/', [RestaurantController::class, 'index'])->name('index');
        Route::get('/create', [RestaurantController::class, 'create'])->name('create');
    });
