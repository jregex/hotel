@extends('layouts.main-admin')

@section('custom-css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- DateTime picker CSS CDN -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-sm border-none text-white" role="alert">
            @foreach ($errors->all() as $error)
            <span class="alert-text">* {{ $error }}</span> <br>
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('booking.update',['transaction'=>$bookings->id]) }}" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $bookings->room_id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tamu_id">Tamu</label>
                                <select name="tamu_id" class="form-control select2bs4 select2-hide-accessible"
                                    id="tamu_id">
                                    @foreach ($tamus as $item)
                                    <option value="{{ $item->id }}" {{ $bookings->tamu_id==$item->id ? 'selected':''
                                        }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_tamu">Jumlah tamu</label>
                                <input type="number" class="form-control" id="jumlah_tamu" name="jumlah_tamu"
                                    value="{{ $bookings->jumlah_tamu }}">
                                Maksimal <span class="text-danger" id="maks">{{ $rooms->maks }}</span> orang
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga/malam</label>
                                <input type="number" class="form-control" id="harga"
                                    value="{{ $rooms->category_rooms->harga }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkin">Checkin</label>
                                <input id="checkin" name="checkin" class="form-control" type="text"
                                    value="{{ date('Y/m/d H:i',strtotime($bookings->checkin)) }}" />
                            </div>
                            <div class="form-group">
                                <label for="checkout">Checkout</label>
                                <input id="checkout" name="checkout" class="form-control" type="text"
                                    value="{{ date('Y/m/d H:i',strtotime($bookings->checkout)) }}" />
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" name="total" id="total" class="form-control"
                                    value="{{ $bookings->total }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control select2bs4 select2-hide-accessible"
                                    id="status">
                                    <option value="terpakai" {{ $bookings->status=="terpakai" ? 'selected':''
                                        }}>Terpakai</option>
                                    <option value="terpakai" {{ $bookings->status=="selesai" ? 'selected':''
                                        }}>Selesai</option>
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('bookings.list') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<!-- Select2 -->
<script src="{{ asset('assets/assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>
<script>
    $(document).ready(function(){
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        });
        $('#jumlah_tamu').keyup(()=>{
            if($('#jumlah_tamu').val() > $('#maks').text()){
                Swal.fire({
                    icon: 'error',
                    title: 'Jumlah orang melebihi maksimal'
                })
            }
        })
        //Date and time picker
        $('#checkin').datetimepicker({
        format:'Y/m/d H:i'
        });
        $('#checkout').datetimepicker({
        format:'Y/m/d H:i'
        });
        $('#checkout').change(()=>{
            function diff_minutes(dt2, dt1)
            {
                let diff =(dt2.getTime() - dt1.getTime()) / 1000;
                diff /= 60;
                return Math.abs(Math.round(diff));
            }
            let check = new Date($('#checkin').val());
            let out = new Date($('#checkout').val());
            let waktu = Math.floor(diff_minutes(check,out)/60);
            let hari=0;
            if(waktu > 14){
                hari=Math.floor(waktu/14);
            }else{
                hari=1;
            }
            let total=$('#harga').val()*hari;
            $('#total').val(total);
        })

    });
</script>
@endsection
