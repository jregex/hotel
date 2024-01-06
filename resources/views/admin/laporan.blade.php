<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel | Riwayat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .text-small {
            font-size: 11px
        }

        .text-medium {
            font-size: 12px
        }
    </style>
</head>

<body>

    <table class="table table-striped" align="center">
        <thead class="bg-dark">
            <tr>
                <th class="text-white text-medium">No</th>
                <th class="text-white text-medium">Kamar</th>
                <th class="text-white text-medium">KTP</th>
                <th class="text-white text-medium">Nama</th>
                <th class="text-white text-medium">Tamu</th>
                <th class="text-white text-medium">Checkin</th>
                <th class="text-white text-medium">Checkout</th>
                <th class="text-white text-medium">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $item)
            <tr>
                <td class="text-small">{{ $loop->iteration }}</td>
                <td class="text-small">{{ $item->rooms->no_kamar }}</td>
                <td class="text-small">{{ $item->tamus->noktp }}</td>
                <td class="text-small">{{ $item->tamus->nama }}</td>
                <td class="text-small">{{ $item->jumlah_tamu }}</td>
                <td class="text-small">{{ date('d-m-Y, H:i',strtotime($item->checkin)) }}</td>
                <td class="text-small">{{ date('d-m-Y, H:i',strtotime($item->checkout)) }}</td>
                <td class="text-small">Rp {{ number_format($item->total) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
