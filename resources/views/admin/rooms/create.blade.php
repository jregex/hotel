@extends('layouts.main-admin')

@section('custom-css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
            <div class="card-header">
                <h5>Tambah {{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('rooms.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_kamar">No Kamar</label>
                        <input type="text" name="no_kamar" class="form-control" id="no_kamar">
                    </div>
                    <div class="form-group">
                        <label for="email">Tipe</label>
                        <select name="category_room_id" class="form-control select2bs4 select2-hide-accessible"
                            id="category_room_id">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->tipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maks">Maksimal orang</label>
                        <input type="number" name="maks" class="form-control" id="maks">
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-2">Save</button>
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
<script>
    $(function(){
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

});
</script>
@endsection
