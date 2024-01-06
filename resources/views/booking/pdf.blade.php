<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel | Invoice Print</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .invoice-title {
            margin-top: 0;
        }

        .dark-mode .invoice {
            background-color: #343a40;
        }

        .invoice-col {
            float: left;
            width: 33.3333%;
        }

        .text-small {
            font-size: 13px
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <strong>Hotel, Inc.</strong>
                        <small class="float-right"><b>Invoice {{ $bookings->invoice }}</b></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row mb-2">
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
                <div class="col-sm-4">
                    <b>Order ID:</b> {{ $bookings->invoice }}<br>
                    <b>Payment Due:</b> {{ date('d/m/Y, H:i') }}<br>
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
                                <th class="text-white text-small">Jumlah</th>
                                <th class="text-white text-small">Kamar</th>
                                <th class="text-white text-small">Tipe</th>
                                <th class="text-white text-small">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-small">1</td>
                                <td class="text-small">{{ $rooms->no_kamar }}</td>
                                <td class="text-small">{{ $rooms->category_rooms->tipe }}</td>
                                <td class="text-small">Rp {{ number_format($rooms->category_rooms->harga) }}</td>
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
                                <th class="text-small" style="width:50%">Subtotal:</th>
                                <td class="text-small">Rp {{ number_format($bookings->total) }}</td>
                            </tr>
                            @php
                            $pajak=($bookings->total*10)/100;
                            @endphp
                            <tr>
                                <th class="text-small">Pajak (10%)</th>
                                <td class="text-small">Rp {{ number_format($pajak) }}</td>
                            </tr>

                            <tr>
                                <th class="text-small">Total:</th>
                                <td class="text-small">Rp {{ number_format($bookings->total+$pajak) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>


</body>

</html>
