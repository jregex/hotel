@extends('layouts.main-admin')

@section('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('assets/assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

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
                <a href="{{ route('riwayat.laporan') }}" class="btn btn-primary">Cetak</a>
            </div>
            <div class="card-body">
                <table id="tb-booking" class="table table-hover table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>KTP</th>
                            <th>Nama</th>
                            <th>Jumlah tamu</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->rooms->no_kamar }}</td>
                            <td>{{ $item->tamus->noktp }}</td>
                            <td>{{ $item->tamus->nama }}</td>
                            <td>{{ $item->jumlah_tamu }}</td>
                            <td>{{ date('d-m-Y, H:i',strtotime($item->checkin)) }}</td>
                            <td>{{ date('d-m-Y, H:i',strtotime($item->checkout)) }}</td>
                            <td>Rp {{ number_format($item->total) }}</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td class="align-middle">
                                <button
                                    class="btn btn-link text-secondary rounded-circle bg-transparent text-dark mb-0 dropdown-toggle"
                                    id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-md"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <form action="{{ route('booking.destroy', ['transaction' => $item->id]) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i
                                                class="fa fa-trash text-danger"></i>
                                            Delete</button>
                                    </form>
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
@section('custom-js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/assets') }}/dist/js/custom-js/booking-set.js"></script>
@endsection
