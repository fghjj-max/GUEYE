<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EmpClasseController;
use App\Http\Controllers\EmpEtudController;
use App\Http\Controllers\EmploieController;
use App\Http\Controllers\EmpProfController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfClasseController;
use App\Http\Controllers\ProfCourController;
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
    return view('index');
});

Route::prefix('/professeur')->name('professeur.')->group(function () {


    Route::get('/', [ProfesseurController::class, 'index'])->name('professeur');
    Route::get('/add', [ProfesseurController::class, 'create'])->name('addProfesseur');
    Route::post('/save', [ProfesseurController::class, 'store'])->name('saveProfesseur');
    Route::delete('/delete/{id}', [ProfesseurController::class, 'destroy'])->name('deleteProfesseur');
    Route::get('/edit/{id}', [ProfesseurController::class, 'edit'])->name('editProfesseur');
    Route::put('/update/{id}', [ProfesseurController::class, 'update'])->name('updateProfesseur');
    Route::get('/show/{id}', [ProfesseurController::class, 'show'])->name('showProfesseur');


});

Route::prefix('/emploie')->name('emploie.')->group(function () {


    Route::get('/', [EmploieController::class, 'index'])->name('emploie');
    Route::get('/add', [EmploieController::class, 'create'])->name('addEmploie');
    Route::post('/save', [EmploieController::class, 'store'])->name('saveEmploie');
    Route::delete('/delete/{id}', [EmploieController::class, 'destroy'])->name('deleteEmploie');
    Route::get('/edit/{id}', [EmploieController::class, 'edit'])->name('editEmploie');
    Route::put('/update/{id}', [EmploieController::class, 'update'])->name('updateEmploie');
    Route::get('/show/{id}', [EmploieController::class, 'show'])->name('showEmploie');


});

Route::prefix('/cour')->name('cour.')->group(function () {


    Route::get('/', [CourController::class, 'index'])->name('cour');
    Route::get('/add', [CourController::class, 'create'])->name('addCour');
    Route::post('/save', [CourController::class, 'store'])->name('saveCour');
    Route::delete('/delete/{id}', [CourController::class, 'destroy'])->name('deleteCour');
    Route::get('/edit/{id}', [CourController::class, 'edit'])->name('editCour');
    Route::put('/update/{id}', [CourController::class, 'update'])->name('updateCour');
    Route::get('/show/{id}', [CourController::class, 'show'])->name('showCour');


});

Route::prefix('/classe')->name('classe.')->group(function () {


    Route::get('/', [ClasseController::class, 'index'])->name('classe');
    Route::get('/add', [ClasseController::class, 'create'])->name('addClasse');
    Route::post('/save', [ClasseController::class, 'store'])->name('saveClasse');
    Route::delete('/delete/{id}', [ClasseController::class, 'destroy'])->name('deleteClasse');
    Route::get('/edit/{id}', [ClasseController::class, 'edit'])->name('editClasse');
    Route::put('/update/{id}', [ClasseController::class, 'update'])->name('updateClasse');
    Route::get('/show/{id}', [ClasseController::class, 'show'])->name('showClasse');


});

Route::prefix('/etudiant')->name('etudiant.')->group(function () {

    Route::get('/', [EtudiantController::class, 'index'])->name('etudiant');
    Route::get('/add', [EtudiantController::class, 'create'])->name('addEtudiant');
    Route::post('/save', [EtudiantController::class, 'store'])->name('saveEtudiant');
    Route::delete('/delete/{id}', [EtudiantController::class, 'destroy'])->name('deleteEtudiant');
    Route::get('/edit/{id}', [EtudiantController::class, 'edit'])->name('editEtudiant');
    Route::put('/update/{id}', [EtudiantController::class, 'update'])->name('updateEtudiant');
            //Route::get('/show/{id}', [EtudiantController::class, 'show'])->name('showEtudiant');

});

Route::prefix('/profcour')->name('profcour.')->group(function () {

    Route::get('/', [ProfCourController::class, 'index'])->name('profcour');
    Route::get('/add', [ProfCourController::class, 'create'])->name('addProfcour');
    Route::post('/save', [ProfCourController::class, 'store'])->name('saveProfcour');

});

Route::prefix('/profclasse')->name('profclasse.')->group(function () {

    Route::get('/', [ProfClasseController::class, 'index'])->name('profclasse');
    Route::get('/add', [ProfClasseController::class, 'create'])->name('addProfclasse');
    Route::post('/save', [ProfClasseController::class, 'store'])->name('saveProfclasse');


});

Route::prefix('/empclasse')->name('empclasse.')->group(function () {

    Route::get('/', [EmpClasseController::class, 'index'])->name('empclasse');
    Route::get('/add', [EmpClasseController::class, 'create'])->name('addEmpclasse');
    Route::post('/save', [EmpClasseController::class, 'store'])->name('saveEmpclasse');


});



Route::prefix('/empprof')->name('empprof.')->group(function () {

    Route::get('/', [EmpProfController::class, 'index'])->name('empprof');
    Route::get('/add', [EmpProfController::class, 'create'])->name('addEmpprof');
    Route::post('/save', [EmpProfController::class, 'store'])->name('saveEmpprof');


});








