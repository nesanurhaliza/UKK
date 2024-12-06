<?php

use App\Http\Controllers\AssessorController;
use App\Http\Controllers\CompetencyElementController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\majorController;
use App\Http\Controllers\ManajemenStandarKompetensiController;
use App\Http\Controllers\standarController;
use App\Http\Controllers\UserController;
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

Route::get('/manajement.standar', function () {
    return view('manajement.standar');
});
Route::get('/', function () {
    return view('welcome');
});
// routes/web.php
Route::middleware(['auth', 'assessor'])->group(function () {
    Route::get('assessor/dashboard', [AssessorController::class, 'index'])->name('assessor.dashboard');
});

Route::post('/auth',[UserController::class,'auth']);
Route::middleware(['statuslogin'])->group(function(){
    // Route::get('/user',[UserController::class,'user']);
    Route::get('/logout',[UserController::class,'logout']);
    Route::get('/profile',[UserController::class,'profile']);
    Route::get('/tambah',[UserController::class,'tambah']);
    Route::post('/tambah',[UserController::class,'add']);
    Route::get('/manage/delete/{id}', [UserController::class,'delete']);
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('/edit/{id}',[UserController::class,'update'])->name('update');



Route::get('/manage', [UserController::class, 'manage'])->name('manage');

// Tambahkan route untuk edit/delete jika belum ada
Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::delete('/assessor/{id}', [UserController::class, 'deleteAssessor'])->name('delete.assessor');
Route::delete('/student/{id}', [UserController::class, 'deleteStudent'])->name('delete.student');


    Route::get('/jurusan.index',[majorController::class,'jurusan']);
    Route::get('/jurusan.create',[majorController::class,'createjurusan']);
    Route::post('/jurusan.create',[majorController::class,'addjurusan']);
    Route::get('/jurusan.edit/{id}',[majorController::class,'edit'])->name('jurusan.edit');
    Route::post('/jurusan.edit/{id}',[majorController::class,'update'])->name('update');
    Route::get('/jurusan.index/delete/{id}', [majorController::class,'delete']);



    Route::get('/manajement.standar', [standarController::class, 'standar']);
    Route::get('/manajement.createstandar', [standarController::class, 'create']);
    Route::post('/manajement.createstandar', [standarController::class, 'addstandar']);
    Route::get('/manajement.editstandar/{id}',[standarController::class,'edit'])->name('manajement.editstandar');
    Route::post('/manajement.editstandar/{id}',[standarController::class,'update'])->name('update');
    Route::get('/manajement.standar/delete/{id}', [standarController::class,'delete']);

    Route::get('/manajement.element', [CompetencyElementController::class, 'index']);
    Route::get('/manajement.createelement', [CompetencyElementController::class, 'create']);
    Route::post('/manajement.createelement', [CompetencyElementController::class, 'addelement']);
    Route::get('/manajement/element/{id}/edit', [CompetencyElementController::class, 'edit'])->name('manajement.editelement');
    Route::put('/manajement/element/{id}', [CompetencyElementController::class, 'update'])->name('manajement.updateelement');
    Route::delete('/manajement/element/{id}', [CompetencyElementController::class, 'destroy'])->name('manajement.deleteelement');





    Route::get('/examinations.index', [ExaminationController::class, 'index'])->name('examinations.index');
Route::get('/examinations.create', [ExaminationController::class, 'create'])->name('examinations.create');

Route::post('/examinations.create', [ExaminationController::class, 'store'])->name('examinations.store');
Route::get('/get-elements/{standardId}', [ExaminationController::class, 'getElements']);

Route::get('/examinations/{id}/edit', [ExaminationController::class, 'edit'])->name('examinations.edit');
Route::post('/examinations/{id}/update', [ExaminationController::class, 'update'])->name('examinations.update');
Route::delete('/examinations/{id}', [ExaminationController::class, 'destroy'])->name('examinations.delete');

// Additional Examination Features
Route::get('/examinations/{id}/details', [ExaminationController::class, 'details'])->name('examinations.details');

Route::get('/examinations.result', [ExaminationController::class, 'results'])->name('examinations.result');

    Route::get('/pilih-standar', [ExaminationController::class, 'showstandar']);
    Route::get('/examinations.create/{id}', [ExaminationController::class, 'showsiswa']);
    Route::get('/menilai/{id}/{standar_id}', [ExaminationController::class, 'showelement']);
    Route::post('/add/examination', [ExaminationController::class, 'addexamination']);
    // Route::post('/laporan/hasil-ujian', [ExaminationController::class, 'addexamination'])->name('laporan.hasilujian');


    Route::get('/pilihstandar', [ExaminationController::class, 'showhasil']);
    Route::get('/lihat/hasil/{id}', [ExaminationController::class, 'result']);
    Route::get('/results', [ExaminationController::class, 'results'])->name('results');





});




