@extends('layout.appadmin')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Role</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Role</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @foreach ($rolebyid as $value)
                    <form action="/admin/roles/{{ $value->role_id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Role ID</label>
                                            <input readonly value="{{ $value->role_id }}" type="text" id="inputID"
                                                class="form-control" name="role_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Role Name</label>
                                            <input value="{{ $value->role_name }}" type="text" id="inputName"
                                                class="form-control" name="role_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" name="submit" value="Apply change"
                                    class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                @endforeach
            </section>
        </div>
    </div>
@endsection
