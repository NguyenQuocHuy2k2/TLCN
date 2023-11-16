@extends('layout.appadmin')
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Coupon</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Coupon</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @foreach ($couponbyid as $value)
                    <form action="/admin/coupons/{{ $value->coupon_id }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="inputName">Coupon_id</label>
                                            <input value="{{ $value->coupon_id }}" type="text" id="inputName"
                                                class="form-control" name="coupon_id" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Coupon code</label>
                                            <input value="{{ $value->coupon_code }}" type="text" id="inputName"
                                                class="form-control" name="coupon_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Coupon type</label>
                                            <select id="inputStatus" class="form-control custom-select" name="coupon_type"
                                                required>
                                                <option selected disabled>Select one</option>
                                                @foreach ($coupontypes as $coupontype)
                                                    <option value="{{ $coupontype->coupon_type }}"
                                                        {{ $coupontype->coupon_type == $value->coupon_type ? 'selected' : '' }}>
                                                        {{ $coupontype->type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Coupon discount</label>
                                            <input value="{{ $value->coupon_amount }}" type="text" id="inputName"
                                                class="form-control" name="coupon_discount" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Min order</label>
                                            <input value="{{ $value->min_order }} " type="text" id="inputMinOrder"
                                                class="form-control" name="min_order" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPrice">Coupon quantity</label>
                                            <input value="{{ $value->coupon_quantity }} " type="text" id="inputPrice"
                                                class="form-control" name="coupon_quantity" onblur="checkPrice(this)">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPrice">Coupon used</label>
                                            <input value="{{ $value->coupon_used }}" type="text" id="inputPrice"
                                                class="form-control" name="coupon_used" onblur="checkPrice(this)">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPrice">Coupon remain</label>
                                            <input value="{{ $value->coupon_remain }}" type="text" id="inputPrice"
                                                class="form-control" name="coupon_remain" onblur="checkPrice(this)">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExpired">Expired date</label>
                                            <input value="{{ $value->coupon_expired }}" type="text" id="inputExpired"
                                                class="form-control" name="coupon_expired" placeholder="Example: 2023-31-12"
                                                required>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const input = document.getElementById('inputExpired');
                                                input.addEventListener('blur', function() {
                                                    const enteredDate = input.value;
                                                    const parsedDate = new Date(enteredDate);
                                                    if (!isNaN(parsedDate.getTime())) {
                                                        const formattedDate = parsedDate.toISOString().split('T')[0];
                                                        input.value = formattedDate;
                                                    } else {
                                                        alert('Invalid date! Please enter in Year-Month-Day format.');
                                                        input.value = '';
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" name="submit" value="Update Coupon" class="btn btn-info float-right"
                                    style="margin-bottom:9px">
                            </div>
                        </div>
                    </form>
                @endforeach
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
