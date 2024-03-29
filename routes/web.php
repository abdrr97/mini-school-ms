<?php

use App\Http\Controllers\EtudiantController;
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

Route::middleware('auth')->group(function ()
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [HomeController::class, 'index'])->name('home.search');

    Route::prefix('/professeurs/')->group(function ()
    {
        Route::get('', [ProfesseurController::class, 'index'])->name('professeur.list');
        Route::get('create', [ProfesseurController::class, 'create'])->name('professxeur.create');
        Route::post('create', [ProfesseurController::class, 'store'])->name('professeur.store');
        Route::get('{id}/edit', [ProfesseurController::class, 'edit'])->name('professeur.edit');
        Route::put('{id}/edit', [ProfesseurController::class, 'update'])->name('professeur.update');
        Route::delete('{id}', [ProfesseurController::class, 'destroy'])->name('professeur.delete');
        Route::get('{id}', [ProfesseurController::class, 'show'])->name('professeur.show');
    });

    Route::prefix('/matieres/')->group(function ()
    {
        Route::get('', [MatiereController::class, 'index'])->name('matiere.list');
        Route::get('create', [MatiereController::class, 'create'])->name('matiere.create');
        Route::post('create', [MatiereController::class, 'store'])->name('matiere.store');
        Route::get('{id}/edit', [MatiereController::class, 'edit'])->name('matiere.edit');
        Route::put('{id}/edit', [MatiereController::class, 'update'])->name('matiere.update');
        Route::delete('{id}', [MatiereController::class, 'destroy'])->name('matiere.delete');
        Route::get('{id}/students', [MatiereController::class, 'attaching_students'])->name('matiere.attach');
        Route::put('{id}/students', [MatiereController::class, 'attach'])->name('matiere.attach');
    });

    Route::prefix('/etudiants/')->group(function ()
    {
        Route::get('', [EtudiantController::class, 'index'])->name('etudiant.list');
        Route::get('create', [EtudiantController::class, 'create'])->name('etudiant.create');
        Route::post('create', [EtudiantController::class, 'store'])->name('etudiant.store');
        Route::get('{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
        Route::put('{id}/edit', [EtudiantController::class, 'update'])->name('etudiant.update');
        Route::delete('{id}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
    });
});
