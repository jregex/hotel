@extends('layouts.main-admin')

@section('content')
<div class="row">
    @foreach ($rooms as $item)
    <div class="col-md-3">
        <a href="{{ route('booking.create',['id'=>$item->id]) }}">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-primary"><i class="fas fa-receipt"></i></span>
                <div class="info-box-content">
                    <h5 class="info-box-text">{{ $item->no_kamar }}</h5>
                    <span class="info-box-number text-dark">{{ $item->category_rooms->tipe }}</span>
                    <span class="info-box-number text-dark">Rp. {{ number_format($item->category_rooms->harga) }} /
                        malam</span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
