<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;
use App\Models\Students;



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




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //route untuk menampilkan student
Route::get('admin/student', [StudentsController::class, 'index']);
Route::get('admin/courses', [CoursesController::class, 'index']);
Route::get('admin/student/create', [StudentsController::class, 'create']);

//route untuk mengirim data student
Route::post('admin/student/store', [StudentsController::class, 'store']);

//route untuk menampilkan halaman edit student
Route::get('admin/student/edit/{id}', [StudentsController::class, 'edit']);

//route untuk menyimpan halaman update student
Route::get('admin/student/update/{id}', [StudentsController::class, 'update']);

//route untuk menghapus student
Route::delete('admin/student/delete/{id}', [StudentsController::class, 'destory']);


Route::get('admin/courses/create', [CoursesController::class, 'create']);

//route untuk mengirim data student
Route::post('admin/courses/store', [CoursesController::class, 'store']);

//route untuk menampilkan halaman edit student
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

//route untuk menyimpan halaman update student
Route::get('admin/courses/update/{id}', [CoursesController::class, 'update']);

//route untuk menghapus student
Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destory']);

});

require __DIR__.'/auth.php';
