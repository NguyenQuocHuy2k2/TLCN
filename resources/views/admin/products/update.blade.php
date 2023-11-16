@extends('layout.appadmin')
@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @foreach ($probyid as $value)
                    <form action="/admin/products/{{ $value->id }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="inputID">ID</label>
                                            <input readonly value="{{ $value->id }}" type="text" id="inputID"
                                                class="form-control" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input value="{{ $value->name }}" type="text" id="inputName"
                                                class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputManu">Manufacture</label>
                                            <select id="inputManu" class="form-control custom-select" name="manu"
                                                required>
                                                <option selected disabled>Select one</option>
                                                @foreach ($manufactures as $manu)
                                                    <option value="{{ $manu->manu_id }}"
                                                        {{ $manu->manu_id == $value->manu_id ? 'selected' : '' }}>
                                                        {{ $manu->manu_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputType">Protype</label>
                                            <select id="inputType" class="form-control custom-select" name="type"
                                                required>
                                                <option selected disabled>Select one</option>
                                                @foreach ($protypes as $type)
                                                    <option value="{{ $type->type_id }}"
                                                        {{ $type->type_id == $value->type_id ? 'selected' : '' }}>
                                                        {{ $type->type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea name="desc" id="summernote" class="form-control" rows="4">{{ $value->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputClientCompany">Price</label>
                                            <input type="text" id="inputClientCompany" class="form-control"
                                                name="price" value="{{ $value->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Discount_price</label>
                                            <input type="text" id="inputClientCompany" class="form-control"
                                                name="discount_price" value="{{ $value->discount_price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFeature">Feature</label>
                                            <select id="inputFeature" class="form-control custom-select" name="feature"
                                                required>
                                                <option value="" selected disabled>Select one</option>
                                                <option value="1" {{ $value->feature == 1 ? 'selected' : '' }}>Nổi bật
                                                </option>
                                                <option value="0" {{ $value->feature == 0 ? 'selected' : '' }}>Không
                                                    nổi bật</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Image</label>
                                            <img style="width:50px" src="{{ asset('assets/img/' . $value->pro_image) }}"
                                                alt="">
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
    @endsection
