@extends('layout.appadmin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payments</h3>

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
                                <th style="width: 15%" class="text-center">
                                    Order_id
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Total cost
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Bank code
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Payment content
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Payment method
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Payment Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $value)
                                <tr>
                                    <td class="text-center" style="width: 15%">{{ $value->order_id }}</td>
                                    <td class="text-center" style="width: 15%">{{ number_format($value->total_cost, 0, ',', '.') }}đ</td>
                                    <td class="text-center" style="width: 15%">{{ $value->bankcode }}</td>
                                    <td class="text-center" style="width: 15%">{{ $value->content }}</td>
                                    <td class="text-center" style="width: 15%">{{ $value->card_type }}</td>
                                    <td class="text-center" style="width: 15%">{{ $value->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $payments->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
