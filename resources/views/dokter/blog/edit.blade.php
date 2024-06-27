@extends('layouts.dokter.dashboard')
@section('title', 'Edit Panduan')
@section('content')
<h1>Edit Blog</h1>
    <form action="{{ route('dokter.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $blog->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img src="{{ Storage::url($blog->image) }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection