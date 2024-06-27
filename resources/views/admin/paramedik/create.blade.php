@extends('layouts.admin.dashboard')
@section('title', 'Create Data')

@section('content')

<div class="container mt-5">
    <!-- Tambah Paramedik Section -->
    <h2>Tambah Paramedik</h2>

    <form action="{{ route('admin.paramedik.create.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control" name="spesialis" required>
        </div>
        <div class="form-group">
            <label for="domisili">Domisili</label>
            <select class="form-select" name="domisili" id="domisili" required>
                @foreach ($kecamatan as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nomor_str">Nomor STR</label>
            <input type="text" class="form-control" name="nomor_str">
        </div>
        <div class="form-group">
            <label for="nomor_whatsapp">Nomor WhatsApp</label>
            <input type="text" class="form-control" name="nomor_whatsapp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
