@section('title', 'Table User')
@extends('layouts.admin.dashboard')
@section('content')
<div class="container-fluid py-4 px-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h3>List User</h3>
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if ($user->email_verified_at != null)
                                                <span class="badge text-bg-info text-white">verified</span>
                                            @else
                                                <span class="badge text-bg-warning text-white">unverified</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center gap-5">
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#addCategory{{ $user->id }}" class="text-danger"
                                                    style="cursor: pointer"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal  to delete operator -->
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                        <div class="modal fade" id="addCategory{{ $user->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <span class=" fs-5" id="staticBackdropLabel">Anda yakin
                                                            untuk menghapus
                                                            <b>{{ $user->name }}</b>
                                                            dari operator?
                                                        </span>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $user->id }}">
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
