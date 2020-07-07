@extends('frontend.home')
@section('title', 'Products')
@section('title-content', 'Products')
@section('content')

    @if(Session::has('success'))
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="alert alert-success" role="alert">
                {!! Session('success') !!}
            </div>
        </div>
    @endif
    <br>
    <a href="{{ route('product.create') }}" class="btn btn-primary">Add New Product</a>
    <br>
    <div class="row">
    <div class="contain-content">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Product</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Code</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Update Price</th>
                        <!-- <th>Last Price</th> -->
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($products as $result => $product)
                        <tr>
                            <td>{{ $result + $products->firstitem() }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{!!wordwrap($product->type, 15, "</br>")!!}</td>
                            <td>
                                @foreach($product->productType as $type)
                                <h2><span class="badge badge-info">{{ $type->name }}</span></h2>
                                @endforeach
                            </td>
                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                            <!-- <td>Rp. {{ number_format($product->last_price)}}</td> -->
                            <td><img src="{{ asset($product->image) }}" alt="" class="img-thumbnail" style="max-width:150px"></td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a>
                                    @if(Auth::user()->level->capacity == 20 || Auth::user()->level->capacity == 90)
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item');"><i class="fa fa-trash"></i> Delete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{ $products->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection