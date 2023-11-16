@extends('layout.appadmin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders Details</h3>
                    <div class="card-tools">
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
                                <th style="width: 10%" class="text-center">
                                    IMAGE
                                </th>
                                <th style="width: 25%" class="text-center">
                                    NAME
                                </th>
                                <th style="width: 15%" class="text-center">
                                    TYPE
                                </th>
                                <th class="text-center">
                                    PRICE
                                </th>
                                <th style="width: 10%" class="text-center">
                                    QUANTITY
                                </th>
                                <th style="width: 15%" class="text-center">
                                    COST
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderdetails as $value)
                                <tr>
                                    <td><img style="width:102px" class="text-center"
                                            src="{{ asset('assets/img/' . $value->product_image) }}">
                                    </td>
                                    <td class="text-center" style="width: 5%">{{ $value->product_name }}</td>
                                    <td class="text-center" style="width: 5%">{{ $value->type_name }}</td>
                                    <td class="text-center" style="width: 30%">
                                        {{ number_format($value->discount_price, 0, ',', '.') }} đ</td>
                                    <td class="text-center">x {{ $value->product_quantity }}</td>
                                    <td style="width: 15%">{{ number_format($value->cost, 0, ',', '.') }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
