@extends('layout.appadmin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    <div class="card-tools">
                        <a class="btn  btn-sm bg-green" href="users/create">
                            <i class="fas fa-plus"></i>
                            Add
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 3%">
                                    User_id
                                </th>
                                <th style="width: 10%">
                                    Image
                                </th>
                                <th style="width: 14%">
                                    First name
                                </th>
                                <th style="width: 30%">
                                    Last name
                                </th>
                                <th style="width: 10%">
                                    Phone
                                </th>
                                <th style="width: 6%">
                                    Username
                                </th>
                                <th style="width: 5%;">
                                    Password
                                </th>
                                <th style="width: 10%;text-align:center">
                                    Role
                                </th>
                                <th style="width: 5%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $value)
                                <tr>
                                    <td style="width:3%">{{ $value->id }}</td>
                                    <td style="width:10%"><img style="width:50px;border-radius:9px"
                                            src="{{ asset('assets/img/' . $value->image) }}" alt=""></td>
                                    <td style="width:14%">{{ $value->First_name }}</td>
                                    <td style="width:30%">{{ $value->Last_name }}</td>
                                    <td style="width:10%">{{ $value->phone }}</td>
                                    <td style="width:6%">{{ $value->username }}</td>
                                    <td style="width:5%">{{ substr($value->password, 0, 40) . '...' }}</td>
                                    <td style="text-align:center;width:10%">{{ $value->role_name }}</td>
                                    <td class="project-actions text-right" style="width:5%">
                                        <form action="users/{{ $value->id }}/edit" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="users/{{ $value->id }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete(event)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $users->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
