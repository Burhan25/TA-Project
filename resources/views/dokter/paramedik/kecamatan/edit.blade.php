@extends('layouts.dokter.dashboard')
@section('title', 'Edit Data')

@section('content')
    <div class="container mt-5">
        <!-- Edit Kecamatan Section -->
        <h4>Edit Kecamatan</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dokter.paramedik.kecamatan.edit.post', $kecamatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Kecamatan</label>
                <input type="text" name="nama" class="form-control" value="{{ $kecamatan->nama }}"
                    placeholder="Nama Kecamatan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
