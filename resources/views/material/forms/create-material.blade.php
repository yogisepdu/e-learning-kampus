@extends('layouts.app')
@section('title', 'Mata Kuliah')
@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Forms</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">{{ $title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ form-element ] start -->
        <div class="col-lg-12">
            <!-- Basic Inputs -->
            <div class="card">
                <div class="card-header">
                    <h5>{{ $description }}</h5>
                </div>
                <form action="{{ route('materials.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label" for="categoryCourse">Pilih Mata Kuliah</label>
                            <select name="course_id" id="categoryCourse" class="form-select" required>
                                <option value="" selected disabled>Select category</option>
                                @foreach ($courses as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="titleCourse">Masukkan Materi Kuliah</label>
                            <input type="text" name="title" id="titleCourse" class="form-control"
                                placeholder="Enter course title" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="file">Masukkan File Materi</label>
                            <input type="file" name="file" id="file"
                                class="form-control @error('file') is-invalid @enderror" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </div>
                </form>
            </div>
            <!-- [ form-element ] end -->
        </div>
    @endsection
