<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;
use App\Models\Students;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
 * Method HTTP :
 * 1. Get = menampilkan halaman
 * 2. Post = mengirim data
 * 3. Put = meng-update data
 * 4. Delete = menghapus data
 */


// rooter untuk menampilkan teks
Route::get('/salam/{nama}', function($nama){
    return "Assalamualaikum $nama";
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

//route untuk menampilkan student
Route::get('admin/student', [StudentsController::class, 'index']);
Route::get('admin/courses', [CoursesController::class, 'index']);

