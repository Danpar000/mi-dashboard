<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoJuegoController;
use App\Http\Controllers\PersonajeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/personajes/printlist', [PersonajeController::class, 'printlist'])->name('personajes.printlist');
Route::get('/videojuegos/printlist', [VideoJuegoController::class, 'printlist'])->name('videojuegos.printlist');

// Crud
Route::middleware('auth')->group(function () {
    Route::resource('/videojuegos', VideoJuegoController::class);
    Route::resource('/personajes', PersonajeController::class);
});
Route::get('/personajes/{personaje}/report', [PersonajeController::class, 'report'])->name('personajes.report');

Route::get('/videojuegos/{videojuego}/report', [VideoJuegoController::class, 'report'])->name('videojuegos.report');

require __DIR__.'/auth.php';
