@extends('layouts.main-admin')

@section('custom-css')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                <form action="{{ route('tamu.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="noktp">No KTP</label>
                                <input type="text" name="noktp" class="form-control" id="noktp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jenkel">Jenis Kelamin</label>
                                <div class="icheck-primary">
                                    <input type="radio" name="jenkel" id="laki" value="Laki - laki">
                                    <label for="laki"> Laki-laki</label>
                                </div>
                                <div class="icheck-primary">
                                    <input type="radio" name="jenkel" id="perempuan" value="Perempuan">
                                    <label for="perempuan"> Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="warga_negara">Warga Negara</label>
                                <input type="text" name="warga_negara" class="form-control" id="warga_negara">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="5"></textarea>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <a href="{{ route('tamu.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-2">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
