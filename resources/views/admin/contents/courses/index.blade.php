@extends('admin.main')
@section('content')

<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Desc</th>
             
                </tr>
                @foreach ($courses as $courses)
                <tr>
                    <td>1</td>
                    <td>{{$courses->nama}}</td>
                    <td>{{$courses->nim}}</td>
                    <td>{{$courses->class}}</td>
                    <td>{{$courses->major}}</td>
                    <td>
                        <a href="#" class="btn btn-wwarning">Edit</a>
                        <a href="#" class="btn btn-wwarning">Delete</a>
                    </td>
                </tr>
               
                    
                @endforeach
            </table>
        </div>
    </div>
  </section>

@endsection