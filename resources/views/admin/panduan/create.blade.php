@extends('layouts.admin.dashboard')

@section('title', 'Create Panduan')

@section('content')
    <h4>Create New Panduan</h4>
    <!-- Form untuk membuat panduan baru -->
    <form action="{{ route('admin.panduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Masukan Judul File</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
