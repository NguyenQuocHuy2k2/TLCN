@extends('layout.appadmin')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Order Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Order Status</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @foreach ($orderbyid as $value)
                    <form action="/admin/orders/{{ $value->order_id }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="inputName">Order ID</label>
                                            <input readonly value="{{ $value->order_id }}" type="text" id="inputID"
                                                class="form-control" name="order_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select id="inputStatus" class="form-control custom-select" name="status">
                                                <option selected disabled>Select one</option>
                                                @foreach ($status as $stt)
                                                    <option value="{{ $stt->status }}"
                                                        {{ $stt->status == $value->status ? 'selected' : '' }}>
                                                        {{ $stt->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
