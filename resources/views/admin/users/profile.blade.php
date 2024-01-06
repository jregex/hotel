@extends('layouts.main-admin')

@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ session()->get('admin-account.image') == 'default.webp' ? asset('assets/assets/dist/img/icon/default.webp') : asset('storage/userprofile/' . session()->get('admin-account.image')) }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ session()->get('admin-account.name') }}</h3>

                <p class="text-muted text-center">{{ ucfirst(session()->get('admin-account.jabatan')) }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>email</b> <a class="float-right">{{ session()->get('admin-account.email') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Username</b> <a class="float-right">{{ session()->get('admin-account.username') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Role</b> <a class="float-right">{{ session()->get('admin-account.role_id')==1 ?
                            'Administrator':'Operator' }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Edit profil</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- /.tab-pane -->

                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" id="addForm" method="post"
                            action="{{ route('profile.update', ['user'=>session()->get('admin-account.id')]) }}"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            @if (session()->has('success'))
                            <div class="alert alert-success fade show mt-2" role="alert">
                                <span class="text-white">{{ session()->get('success') }}</span>
                            </div>
                            @elseif(session()->has('failed'))
                            <div class="alert alert-danger fade show mt-2" role="alert">
                                <span class="text-white">{{ session()->get('failed') }}</span>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        value="{{ session()->get('admin-account.name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                        value="{{ session()->get('admin-account.email') }}">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Username" value="{{ session()->get('admin-account.username') }}">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <div class="col">
                                    <img id="previewImg"
                                        src="{{ session()->get('admin-account.image') == 'default.webp' ? asset('assets/assets/dist/img/icon/default.webp') : asset('storage/userprofile/' . session()->get('admin-account.image')) }}"
                                        alt="PreviewImg" height="200" width="200" class="img-thumbnail">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="form-control form-control-alternative" name="image"
                                            id="image" placeholder="Input File">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                    <button type="button" class="btn btn-secondary" id="resetData">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('custom-js')
<script src="{{ asset('assets/assets/dist/js/custom-js/profile-set.js') }}"></script>
@endsection
