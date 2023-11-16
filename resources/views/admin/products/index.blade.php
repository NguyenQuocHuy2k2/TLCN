@extends('layout.appadmin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <a class="btn btn-sm bg-green" href="products/create">
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
                                <th style="width: 1%">
                                    Product_id
                                </th>
                                <th style="width: 15%">
                                    Name
                                </th>
                                <th style="width: 5%">
                                    Image
                                </th>
                                <th style="width: 25%">
                                    Description
                                </th>
                                <th style="width: 8%">
                                    Price
                                </th>
                                <th style="width: 8%">
                                    Discount price
                                </th>
                                <th style="width: 3%">
                                    Manufactures
                                </th>
                                <th style="width: 6%">
                                    Protype
                                </th>
                                <th style="width: 3%">
                                    Feature
                                </th>
                                <th style="width: 8%">
                                    Created_at
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $value)
                                <tr>
                                    <td style="text-align:center">{{ $value['id'] }}</td>
                                    <td>{{ $value['name'] }}</td>
                                    <td><img style="width:50px"
                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"alt=""></td>
                                    <td class="project_progress">
                                        @if (strlen($value['description']) > 120)
                                            {{ substr($value['description'], 0, 120) }}<a style="color: black;">...</a>
                                        @else
                                            {{ $value['description'] }}
                                        @endif
                                    </td>
                                    <td>{{ number_format($value['price']) }}đ</td>
                                    <td>{{ number_format($value['discount_price']) }}đ</td>
                                    <td class="project_progress">
                                        {{ $value['manu_name'] }}
                                    </td>
                                    <td class="project-state">
                                        {{ $value['type_name'] }}
                                    </td>
                                    <td class="project-state">
                                        @if ($value['feature'] == 1)
                                            {{ 'Nổi bật' }}
                                        @else
                                            {{ 'Không nổi bật' }}
                                        @endif
                                    </td>
                                    <td class="project-state">
                                        {{ $value['created_at'] }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="products/{{ $value->id }}/edit" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="products/{{ $value->id }}" method="POST"
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
                        {{ $products->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
