@extends('layout.appadmin')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @foreach ($userbyid as $value)
                    <form action="/admin/users/{{ $value->id }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="inputName">User ID</label>
                                            <input readonly value="{{ $value->id }}" type="text" id="inputID"
                                                class="form-control" name="user_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">First name</label>
                                            <input value="{{ $value->First_name }}" type="text" id="inputFirst"
                                                class="form-control" name="First_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Last name</label>
                                            <input value="{{ $value->Last_name }}" type="text" id="inputUserLast"
                                                class="form-control" name="Last_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Phone</label>
                                            <input value="{{ $value->phone }}" type="text" id="inputUserPhone"
                                                class="form-control" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Username</label>
                                            <input value="{{ $value->username }}" type="text" id="inputUserName"
                                                class="form-control" name="username" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Old password</label>
                                            <input value="{{ $value->password }}" type="text" id="inputPassword"
                                                class="form-control" name="oldpass" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">New Password</label>
                                            <input value="" type="text" id="inputPassword" class="form-control"
                                                name="newpass">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Role</label>
                                            <select id="inputStatus" class="form-control custom-select" name="role">
                                                <option selected disabled>Select one</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->role_id }}"
                                                        {{ $role->role_id == $value->role_id ? 'selected' : '' }}>
                                                        {{ $role->role_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Image</label>
                                            <img style="width:50px;border-radius:9px"
                                                src="{{ asset('assets/img/' . $value->image) }}" alt="">
                                            <input type="file" name="image" id="fileToUpload">
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
