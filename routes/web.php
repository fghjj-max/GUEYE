<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EmploieController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;

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

Route::prefix('/professeur')->name('professeur.')->group(function () {


    Route::get('/', [ProfesseurController::class, 'index'])->name('index');
    Route::get('/add', [ProfesseurController::class, 'create'])->name('addProfesseur');
    Route::post('/save', [ProfesseurController::class, 'store'])->name('saveProfesseur');
    Route::delete('/delete/{id}', [ProfesseurController::class, 'destroy'])->name('deleteProfesseur');
    Route::get('/edit/{id}', [ProfesseurController::class, 'edit'])->name('editProfesseur');
    Route::put('/update/{id}', [ProfesseurController::class, 'update'])->name('updateProfesseur');
    Route::get('/show/{id}', [ProfesseurController::class, 'show'])->name('showProfesseur');


});

Route::prefix('/emploie')->name('emploie.')->group(function () {


    Route::get('/', [EmploieController::class, 'index'])->name('index');
    Route::get('/add', [EmploieController::class, 'create'])->name('addEmploie');
    Route::post('/save', [EmploieController::class, 'store'])->name('saveEmploie');
    Route::delete('/delete/{id}', [EmploieController::class, 'destroy'])->name('deleteEmploie');
    Route::get('/edit/{id}', [EmploieController::class, 'edit'])->name('editEmploie');
    Route::put('/update/{id}', [EmploieController::class, 'update'])->name('updateEmploie');
    Route::get('/show/{id}', [EmploieController::class, 'show'])->name('showEmploie');


});

Route::prefix('/cour')->name('cour.')->group(function () {


    Route::get('/', [CourController::class, 'index'])->name('index');
    Route::get('/add', [CourController::class, 'create'])->name('addCour');
    Route::post('/save', [CourController::class, 'store'])->name('saveCour');
    Route::delete('/delete/{id}', [CourController::class, 'destroy'])->name('deleteCour');
    Route::get('/edit/{id}', [CourController::class, 'edit'])->name('editCour');
    Route::put('/update/{id}', [CourController::class, 'update'])->name('updateCour');
    Route::get('/show/{id}', [CourController::class, 'show'])->name('showCour');


});

Route::prefix('/classe')->name('classe.')->group(function () {


    Route::get('/', [ClasseController::class, 'index'])->name('index');
    Route::get('/add', [ClasseController::class, 'create'])->name('addClasse');
    Route::post('/save', [ClasseController::class, 'store'])->name('saveClass');
    Route::delete('/delete/{id}', [ClasseController::class, 'destroy'])->name('deleteClass');
    Route::get('/edit/{id}', [ClasseController::class, 'edit'])->name('editClass');
    Route::put('/update/{id}', [ClasseController::class, 'update'])->name('updateClass');
    Route::get('/show/{id}', [ClasseController::class, 'show'])->name('showClass');


});

Route::prefix('/etudiant')->name('etudiant.')->group(function () {

    Route::get('/', [EtudiantController::class, 'index'])->name('index');
    Route::get('/add', [EtudiantController::class, 'create'])->name('addEtudiant');
    Route::post('/save', [EtudiantController::class, 'store'])->name('saveEtudiant');
    Route::delete('/delete/{id}', [EtudiantController::class, 'destroy'])->name('deleteEtudiant');
    Route::get('/edit/{id}', [EtudiantController::class, 'edit'])->name('editEtudiant');
    Route::put('/update/{id}', [EtudiantController::class, 'update'])->name('updateEtudiant');
    Route::get('/show/{id}', [EtudiantController::class, 'show'])->name('showEtudiant');

});








