<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [PokedexController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/pokemon', [PokemonController::class, 'index'])->name('pokemon.index');
});

Route::resource('/pokedex', PokedexController::class);
Route::resource('/pokemon', PokemonController::class);



