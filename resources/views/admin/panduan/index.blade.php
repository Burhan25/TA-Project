@extends('layouts.admin.dashboard')
@section('title', 'Table Panduan')
@section('content')
    <h4>Menejemen Panduan</h4>
    <div class="container mt-5">
        <a href="{{ route('admin.panduan.create') }}" class="btn btn-primary mb-3">Tambahkan Panduan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table border">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($panduans as $panduan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $panduan->title }}</td>
                        <td><a href="{{ asset('storage/' . $panduan->file) }}" target="_blank">View PDF</a></td>
                        <td>
                            <a href="{{ route('admin.panduan.edit', $panduan) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.panduan.delete', $panduan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
