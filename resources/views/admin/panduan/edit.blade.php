@extends('layouts.admin.dashboard')

@section('title', 'Edit Panduan')

@section('content')
    <h4>Edit Panduan</h4>
    <div class="container mt-5">
        <form action="{{ route('admin.panduan.update', $panduan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Masukan Judul File</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $panduan->title }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
