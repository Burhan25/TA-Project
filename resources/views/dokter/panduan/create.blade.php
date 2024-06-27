

@extends('layouts.dokter.dashboard')

@section('title', 'Create Panduan')

@section('content')
    <h1>Create New Panduan</h1>
    <!-- Form untuk membuat panduan baru -->
    <form action="{{ route('dokter.panduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
