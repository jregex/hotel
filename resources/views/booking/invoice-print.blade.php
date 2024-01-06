<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/assets') }}/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
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
                        <thead class="bg-dark">
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
