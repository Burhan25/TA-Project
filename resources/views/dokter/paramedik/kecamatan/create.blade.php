@extends('layouts.dokter.dashboard')
@section('title', 'Create Data')

@section('content')
    <div class="container mt-5">
        <!-- Tambah Kecamatan Section -->
        <h1>Tambah Kecamatan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dokter.paramedik.kecamatan.create.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Input Kecamatan</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Kecamatan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
