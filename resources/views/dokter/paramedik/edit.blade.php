@extends('layouts.dokter.dashboard')
@section('title', 'Edit Data')

@section('content')

    <div class="container mt-5">
        <h4>Edit Paramedik</h4>

        <form action="{{ route('dokter.paramedik.edit.post', $paramedik->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto">
                @if ($paramedik->foto)
                    <img src="{{ asset('images/' . $paramedik->foto) }}" alt="Foto Paramedik" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $paramedik->nama }}" required>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" class="form-control" name="spesialis" value="{{ $paramedik->spesialis }}" required>
            </div>
            <div class="form-group">
                <label for="domisili">Domisili</label>
                <select class="form-select" name="domisili" id="domisili" required>
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->id }}" {{$item->id == $paramedik->domisili ? 'selected' : ''}}>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nomor_str">Nomor STR</label>
                <input type="text" class="form-control" name="nomor_str" value="{{ $paramedik->nomor_str }}">
            </div>
            <div class="form-group">
                <label for="nomor_whatsapp">Nomor WhatsApp</label>
                <input type="text" class="form-control" name="nomor_whatsapp" value="{{ $paramedik->nomor_whatsapp }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
