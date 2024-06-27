
@extends('layouts.dokter.dashboard')

@section('title', 'Edit Panduan')

@section('content')

    <div class="container mt-5">
        <h4 class="mb-4">Edit Panduan</h4>
        <form action="{{ route('dokter.panduan.update', $panduan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $panduan->title }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
