<!-- resources/views/admin/panduan/index.blade.php -->

@extends('layouts.dokter.dashboard')

@section('title', 'Table Panduan')

@section('content')
    <h4>Manajemen Panduan</h4>
    <div class="container mt-5">
        <a href="{{ route('dokter.panduan.create') }}" class="btn btn-primary mb-3">Create New Panduan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table border">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
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
                            <a href="{{ route('dokter.panduan.edit', $panduan) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dokter.panduan.delete', $panduan) }}" method="POST" class="d-inline">
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
