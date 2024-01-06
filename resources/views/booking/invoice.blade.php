@extends('layouts.main-admin')

@section('content')
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Hotel, Inc.
                <small class="float-right">Date: {{ date('d/m/Y') }}</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Hotel, Inc.</strong><br>
                {{ session()->get('admin-account.name') }}<br>
                Email: {{ session()->get('admin-account.email') }}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{ $bookings->tamus->nama }}</strong><br>
                {{ $bookings->tamus->alamat }}<br>
                Phone: {{ $bookings->tamus->no_hp }}<br>
                Email: {{ $bookings->tamus->email }}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice {{ $bookings->invoice }}</b><br>
            <br>
            <b>Order ID:</b> {{ $bookings->invoice }}<br>
            <b>Payment Due:</b> {{ date('d/m/Y, H:i',strtotime($bookings->updated_at)) }}<br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row mb-4">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jumlah</th>
                        <th>Kamar</th>
                        <th>Tipe</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $rooms->no_kamar }}</td>
                        <td>{{ $rooms->category_rooms->tipe }}</td>
                        <td>Rp {{ number_format($rooms->category_rooms->harga) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- /.col -->
        <div class="col-6">

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp {{ number_format($bookings->total) }}</td>
                    </tr>
                    @php
                    $pajak=($bookings->total*10)/100;
                    @endphp
                    <tr>
                        <th>Pajak (10%)</th>
                        <td>Rp {{ number_format($pajak) }}</td>
                    </tr>

                    <tr>
                        <th>Total:</th>
                        <td>Rp {{ number_format($bookings->total+$pajak) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <form action="{{ route('invoice-print') }}" method="post">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $bookings->id }}">
                <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">Submit</button>
            </form>
            <a href="{{ route('bookings.list') }}" class="btn btn-danger">Kembali</a>
            <a href="{{ route('generatepdf', ['transaction'=>$bookings->id]) }}" class="btn btn-primary">
                <i class="fas fa-download"></i> Generate PDF
            </a>
        </div>
    </div>
</div>
<!-- /.invoice -->
@endsection
