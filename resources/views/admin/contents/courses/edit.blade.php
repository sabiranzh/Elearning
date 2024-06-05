@extends('admin.main')
@section('content')

<div class="pagetitle">
    <h1>Edit Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">courses</li>
        <li class="breadcrumb-item active">Edit courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/courses/update/{{$Courses->id}}" method="get" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$Courses->name ?? ''}}">
                </div>

                <div class="mb-2">
                    <label for="nim" class="form-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{$Courses->category ?? ''}}">
                </div>


                <div class="mb-2">
                    <label for="class" class="form-label">Decs</label>
                    <input type="text" name="decs" id="decs" class="form-control" value="{{$Courses->decs ?? ''}}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
  </section>

@endsection