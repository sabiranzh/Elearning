<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        //menarik data dari database
        $students=Students::all();

        //panggil vuew dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }
}
