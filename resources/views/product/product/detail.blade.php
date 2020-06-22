@extends('frontend.home')
@section('title', 'Details Product')
@section('title-content', 'Details Product')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="alert alert-success" role="alert">
                {!! Session('success') !!}
            </div>
        </div>
    @endif

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
    </div>

    <br>
    <br>
    <div class="x_panel">
        <div class="x_title">
            <h2>Information <strong>{{$product->name}}</strong></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-xl-3">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" class="img-responsive avatar-view card-img-top img-fluid" alt="{{ $product->name }}">
                        <div class="card-body">
                            <form action="{{ route('product.image', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Update Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-xl-9">
                    <div class="profile_title">
                        <div class="col-md-6"><h2>Information</h2></div>
                        <div class="clearfix"></div>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Merk</strong></td>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Type</strong></td>
                                <td>{{ $product->type }}</td>
                            </tr>
                            <tr>
                                <td><strong>Specification</strong></td>
                                <td>{{ $product->spec }}</td>
                            </tr>
                                <td><strong>Category</strong></td>
                                <td>
                                    @foreach($product->productType as $type)
                                        <h2><span class="badge badge-info">{{ $type->name }}</span></h2>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Satuan</strong></td>
                                <td>{{ $product->unit }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="profile_title">
                        <div class="col-md-6"><h2>Transaction</h2></div>
                        <div class="clearfix"></div>
                    </div>
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <table class="table tabel-striped">
                        <thead>
                            <th>Date</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1 day ago</td>
                                <td>Egi</td>
                                <td>1</td>
                                <td>Rp. 5,000</td>
                                <td>Rp. 5,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection