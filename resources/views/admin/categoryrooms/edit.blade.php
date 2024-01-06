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
                <form action="{{ route('categories.update',['categoryRoom'=>$categories->id]) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" name="tipe" class="form-control" id="tipe" value="{{ $categories->tipe }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga/malam</label>
                        <input type="number" name="harga" class="form-control" id="harga"
                            value="{{ $categories->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea name="desc" id="desc" cols="5" rows="5"
                            class="form-control">{{ $categories->desc }}</textarea>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-2">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
