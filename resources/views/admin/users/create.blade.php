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
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $item)
                            <option value="{{ $item->id }}">
                                {{ ucfirst($item->role) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <img id="previewImg" src="{{ asset('assets/admin/assets/img/icons/default.webp') }}"
                                alt="PreviewImg" height="200" width="200" class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <div class="custom-file mb-2">
                                <input type="file" class="form-control" name="image" id="image"
                                    placeholder="Input File">
                            </div>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-2">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    let fileupload = document.querySelector('#image');
        fileupload.onchange=function(){
            uplaodImg(this);
        };
        function uplaodImg(image){
            let reader = new FileReader();
            let name = image.value;
            name = name.substring(name.lastIndexOf('\\')+1);
            reader.onload = (e)=>{
                $('#previewImg').attr('src',e.target.result);
                // hide(preview);
                $('#previewImg').fadeIn("slow");
            }
            reader.readAsDataURL(image.files[0]);
        }
</script>
@endsection
