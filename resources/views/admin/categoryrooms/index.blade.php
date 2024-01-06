@extends('layouts.main-admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
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
                <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Harga/malam</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tipe }}</td>
                            <td>{{ number_format($item->harga) }}</td>
                            <td class="align-middle">
                                <button
                                    class="btn btn-link text-secondary rounded-circle bg-transparent text-dark mb-0 dropdown-toggle"
                                    id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-md"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <form action="{{ route('categories.delete', ['categoryRoom' => $item->id]) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i
                                                class="fa fa-trash text-danger"></i>
                                            Delete</button>
                                    </form>
                                    <a class="dropdown-item"
                                        href="{{ route('categories.edit', ['categoryRoom' => $item->id]) }}"><i
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
    <!-- /.col-md-6 -->
</div>
@endsection
