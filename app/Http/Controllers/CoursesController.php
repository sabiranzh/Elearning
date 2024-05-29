<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
   //method untuk menampilkan data student
   public function index(){
    //menarik data dari database
    $courses=Courses::all();

    //panggil vuew dan kirim data students
    return view('admin.contents.courses.index', [
        'courses' => $courses
    ]);
}
}


