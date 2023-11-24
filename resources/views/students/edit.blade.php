@extends('layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Student</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Student
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Create New</div>
                            </div>

                            <div class="card-body">
                                @if (\Session::has('msg'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('msg') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mx-auto w-50 mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" class="form-control" value="{{ $student->code }}">
                                    </div>


                                    <div class="mx-auto w-50 mt-3">
                                        <label for="date_of_birth">Birthday</label>
                                        <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="img">Img</label>
                                        <input type="file" name="img" id="img" class="form-control">
                                        <img src="{{ \Storage::url($student->img) }}" alt="" width="100px">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="is_active">Is Active</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option @if ($student->is_active)
                                                selected
                                            @endif value="1">Active</option>
                                            <option @if ($student->is_active)
                                                selected
                                            @endif value="0">Inactive</option>
                                        </select>
                                    </div>


                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="{{ route('students.index') }}" class="btn btn-warning me-2">Back to
                                            list</a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </form>
                                    </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
