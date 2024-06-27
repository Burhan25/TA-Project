@section('title', 'Table Dokter')
@extends('layouts.admin.dashboard')
@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h3>List Dokter</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addOperator">Daftarkan Dokter</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>No</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Email Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dokters as $dokter)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dokter->name }}</td>
                                            <td>{{ $dokter->email }}</td>
                                            <td class="text-center">
                                                @if ($dokter->email_verified_at != null)
                                                    <span class="badge text-bg-info text-white">verified</span>
                                                @else
                                                    <span class="badge text-bg-warning text-white">unverified</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center align-items-center gap-2">
                                                    @if ($dokter->email_verified_at == null)
                                                        <form action="{{ route('admin.dokter.resend') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="email"
                                                                value="{{ $dokter->email }}">
                                                            <button type="submit" class="btn btn-sm text-info">Kirim
                                                                ulang link
                                                                verifikasi</button>
                                                        </form>
                                                        <form action="{{ route('admin.dokter.verify') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="email"
                                                                value="{{ $dokter->email }}">
                                                            <button type="submit" class="btn btn-sm text-info">Verisikasi
                                                                sekarang</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center gap-5">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#addCategory{{ $dokter->id }}" class="text-danger"
                                                        style="cursor: pointer"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal  to delete operator -->
                                        <form action="{{ route('admin.dokter.delete', $dokter->id) }}" method="POST">
                                            <div class="modal fade" id="addCategory{{ $dokter->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <span class=" fs-5" id="staticBackdropLabel">Anda yakin
                                                                untuk menghapus
                                                                <b>{{ $dokter->name }}</b>
                                                                dari operator?
                                                            </span>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="dokter_id"
                                                                value="{{ $dokter->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Yakin</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{ $dokters->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to add operator -->
    <div class="modal fade" id="addOperator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.dokter.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
