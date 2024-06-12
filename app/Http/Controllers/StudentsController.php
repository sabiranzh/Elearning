<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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

    //method untuk menampilkan data create
    public function create(){
        //mendapatkan data courses
        $courses = Courses::all();
        //memanggil view
        return view('admin.contents.student.create',
        ['courses' => $courses]);
    }



    //method untuk menyimpan data student
    public function store(Request $request){

       //validasi data
       $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
        'courses_id' => 'nullable',
       ]);

       // simpan ke database
       Students::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        'courses_id' => $request->courses_id
       ]);

       //kembalikan ke halaman student
       return redirect('/admin/student') -> with ('message', 'Berhasil Menambahkan Student');
    }

    //methhod untuk menampilkan halaman edit
    public function edit($id)
    {
        //cari data berdasarkan id
        $Students = Students::find ($id); //Select * FROM students WHERE id = $id;

        $courses = Courses::all();

        return view('admin.contents.student.edit', [
            'Students' => $Students,
            'courses' => $courses,
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
    // cari data student dari id
    $Students = Students::find ($id); //Select * FROM students WHERE id = $id
    
     //validasi data
     $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
        'courses_id' => 'nullable',
       ]);

    //simpan perubahan
   $Students->update([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        'courses_id' => $request->courses_id,
       ]);
       //kembalikan ke halaman student
       return redirect('/admin/student') -> with ('message', 'Berhasil Mengedit Student');
    }

    //method untuk menghapus student
    public function destory($id)
    {
        // cari data student dari id
        $Students = Students::find ($id); //Select * FROM students WHERE id = $id
        // hapus student
        $Students->delete();
        //kembalikan ke halaman student
       return redirect('/admin/student') -> with ('message', 'Berhasil Mengedit Student');

    }
}