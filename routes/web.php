<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfesseurController;

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

Auth::routes();

Route::get('/', function ()
{
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/professeurs/')->group(function () {
    Route::get('', [ProfesseurController::class, 'index'])->name('professeur.list');
    Route::get('create', [ProfesseurController::class, 'create'])->name('professeur.create');
    Route::post('create', [ProfesseurController::class, 'store'])->name('professeur.store');
    Route::get('{id}/edit', [ProfesseurController::class, 'edit'])->name('professeur.edit');
    Route::put('{id}/edit', [ProfesseurController::class, 'update'])->name('professeur.update');
    Route::delete('{id}', [ProfesseurController::class, 'destroy'])->name('professeur.delete');
    Route::get('{id}', [ProfesseurController::class, 'show'])->name('professeur.show');
});

Route::prefix('/matieres/')->group(function () {
    Route::get('', [MatiereController::class, 'index'])->name('matiere.list');
    Route::get('create', [MatiereController::class, 'create'])->name('matiere.create');
    Route::post('create', [MatiereController::class, 'store'])->name('matiere.store');
    Route::get('{id}/edit', [MatiereController::class, 'edit'])->name('matiere.edit');
    Route::put('{id}/edit', [MatiereController::class, 'update'])->name('matiere.update');
    Route::delete('{id}', [MatiereController::class, 'destroy'])->name('matiere.delete');
});
