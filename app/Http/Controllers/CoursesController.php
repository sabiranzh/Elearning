<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
   //method untuk menampilkan data courses
   public function index(){
    //menarik data dari database
    $courses=Courses::all();

    //panggil view dan kirim data Courses
    return view('admin.contents.courses.index', [
        'courses' => $courses
    ]);
}

 //method untuk menampilkan data create
 public function create(){
    return view('admin.contents.courses.create');
}



//method untuk menyimpan data courses
public function store(Request $request){


   //validasi data
   $request->validate([
    'name' => 'required',
    'category' => 'required',
    'decs' => 'required',
   ]);

   // simpan ke database
   Courses::create([
    'name' => $request->name,
    'category' => $request->category,
    'decs' => $request->decs,
   ]);

   //kembalikan ke halaman courses
   return redirect('/admin/courses') -> with ('message', 'Berhasil Menambahkan courses');
}

//methhod untuk menampilkan halaman edit
public function edit($id)
{
    //cari data berdasarkan id
    $Courses= Courses::find ($id); //Select * FROM CoursesWHERE id = $id;

    return view('admin.contents.courses.edit', [
        'Courses' => $Courses
    ]);
}

//method untuk menyimpan hasil update
public function update($id, Request $request){
// cari data courses dari id
$Courses= Courses::find ($id); //Select * FROM CoursesWHERE id = $id

 //validasi data
 $request->validate([
    'name' => 'required',
    'category' => 'required',
    'decs' => 'required',
   ]);

//simpan perubahan
$Courses->update([
    'name' => $request->name,
    'category' => $request->category,
    'decs' => $request->decs,
   ]);
   //kembalikan ke halaman courses
   return redirect('/admin/courses') -> with ('message', 'Berhasil Mengedit courses');
}

//method untuk menghapus courses
public function destory($id)
{
    // cari data courses dari id
    $Courses= Courses::find ($id); //Select * FROM CoursesWHERE id = $id
    // hapus courses
    $Courses->delete();
    //kembalikan ke halaman courses
   return redirect('/admin/courses') -> with ('message', 'Berhasil Mengedit courses');

}

}


