@extends('layouts.dokter.dashboard')
@section('title', 'Table Paramedik')

@section('content')
    <div class="container mt-5">
        <h4>Manajemen Kecamatan</h4>
        <a href="{{ route('dokter.paramedik.kecamatan.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table border">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Nama Kecamatan</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="d-flex gap-3">
                            <a class="btn btn-primary"
                                href="{{ route('dokter.paramedik.kecamatan.edit', $item->id) }}">Edit</a>
                            <form action="{{ route('dokter.paramedik.kecamatan.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h4>Daftar Paramedik</h4>
        <a href="{{ route('dokter.paramedik.create') }}" class="btn btn-primary mb-3">Tambah Paramedik</a>

        <table class="table border">
            <thead class="table-secondary">
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Domisili</th>
                    <th>Nomor STR</th>
                    <th>Nomor WhatsApp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paramedik as $item)
                    <tr>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('images/' . $item->foto) }}" alt="Foto Paramedik" width="50">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->spesialis }}</td>
                        <td>
                            @if ($item->domisiliId)
                                {{ $item->domisiliId->nama }}
                            @else
                                Tidak ada domisili
                            @endif
                        </td>
                        <td>{{ $item->nomor_str }}</td>
                        <td>{{ $item->nomor_whatsapp }}</td>
                        <td class="d-flex gap-3">
                            <a href="{{ route('dokter.paramedik.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dokter.paramedik.delete', $item->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus paramedik ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
