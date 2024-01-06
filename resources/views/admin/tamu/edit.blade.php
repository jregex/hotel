@extends('layouts.main-admin')

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
                <form action="{{ route('tamu.update',['tamu'=>$tamus->id]) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="noktp">No KTP</label>
                                <input type="text" name="noktp" class="form-control" id="noktp"
                                    value="{{ $tamus->noktp }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $tamus->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $tamus->nama }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jenkel">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input type="radio" name="jenkel" {{ $tamus->jenkel=='Laki - laki' ? 'checked':'' }}
                                    class="form-check-input" id="jenkel"
                                    value="Laki - laki">
                                    <label class="form-check-label"> Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jenkel" class="form-check-input" {{
                                        $tamus->jenkel=='Perempuan' ? 'checked':'' }} id="jenkel"
                                    value="Perempuan">
                                    <label class="form-check-label"> Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp"
                                    value="{{ $tamus->no_hp }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="warga_negara">Warga Negara</label>
                                <input type="text" name="warga_negara" class="form-control" id="warga_negara"
                                    value="{{ $tamus->warga_negara }}">
                            </div>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="10"
                            rows="5">{{ $tamus->alamat }}</textarea>
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
