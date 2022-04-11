<?php

use App\Http\Controllers\RestaurantController;
use App\Models\Menu;
use App\Models\Restaurant;
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

// ------------------------------- Controller Routes-----------------------------------
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
    ->scopeBindings() // aplica o route model binding com escopo para rotas com parâmetros aninhados
    ->group(function () {
        Route::get('/', [RestaurantController::class, 'index'])->name('index');
        Route::get('/create', [RestaurantController::class, 'create'])->name('create');
        Route::get('/{restaurant}/menus/{menu:id}', function (Restaurant $restaurant, Menu $menu) {
            dd($menu);
        });
    });


// ------------------------------- Route model binding -----------------------------------

/*
 * Passando o parâmetro dinâmico na rota, o Laravel procura automaticamente pelo id daquele objeto,
 */
//Route::get('/restaurants/{restaurant}/menus/{menu}', function(Restaurant $restaurant, Menu $menu){
//    dd($menu);
//});

/*
 * Mas ele não pega o menu certo do restaurante certo. Teríamos que passar o escopo "id" no parametro dinamico
 */
//Route::get('/restaurants/{restaurant}/menus/{menu:id}', function(Restaurant $restaurant, Menu $menu){
//    dd($menu);
//});

/*
 * No Laravel 9, apenas adicionamos o método scopeBindings() e tudo está resolvido.
 * Garantimos que o menu que vai ser passado pertence ao restaurante passado
 */
//Route::get('/restaurants/{restaurant}/menus/{menu:id}', function (Restaurant $restaurant, Menu $menu) {
//    dd($menu);
//})->scopeBindings();
