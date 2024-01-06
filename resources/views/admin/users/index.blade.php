@extends('layouts.main-admin')

@section('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('assets/assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-sm border-none text-white" role="alert">
            @foreach ($errors->all() as $error)
            <span class="alert-text">* {{ $error }}</span> <br>
            @endforeach
        </div>
        @endif
        <div class="card">
            @if (session()->has('success'))
            <div class="alert alert-success mt-2" role="alert">
                <span class="text-white">{{ session()->get('success') }}</span>
            </div>
            @elseif(session()->has('failed'))
            <div class="alert alert-danger mt-2" role="alert">
                <span class="text-white">{{ session()->get('failed') }}</span>
            </div>
            @endif

            <div class="card-header pb-2">
                <a href="{{ route('users.create') }}" class="btn btn-success">Tambah</a>
            </div>
            <div class="card-body px-2 py-2">
                <div class="table-responsive p-0">
                    <table id="tb-users" class="table table-hover table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role->role }}</td>
                                <td class="align-middle">
                                    <button
                                        class="btn btn-link text-secondary rounded-circle bg-transparent text-dark mb-0 dropdown-toggle"
                                        id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-md"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <form action="{{ route('users.delete', ['user' => $item->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i
                                                    class="fa fa-trash text-danger"></i>
                                                Delete</button>
                                        </form>
                                        <a class="dropdown-item"
                                            href="{{ route('users.edit', ['user' => $item->id]) }}"><i
                                                class="fa fa-edit text-warning"></i> Edit</a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/assets') }}/dist/js/custom-js/user-set.js"></script>
@endsection
