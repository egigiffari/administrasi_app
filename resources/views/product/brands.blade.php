@extends('frontend.home')
@section('title', 'Brands')
@section('title-content', 'Brands')
@section('content')

        @if(Session::has('success'))
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                    {!! Session('success') !!}
                </div>
            </div>
        @endif

    <br>
    <a href="{{ route('brand.create') }}" class="btn btn-primary">Add New Brand</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Brands</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                   <thead>
                       <th>No</th>
                       <th>Code</th>
                       <th>Name</th>
                       <th>Action</th>
                   </thead>
                   <tbody>
                       @foreach($brands as $result => $brand)
                       <tr>
                           <td>{{ $result + $brands->firstitem() }}</td>
                           <td>{{ $brand->code }}</td>
                           <td>{{ $brand->name }}</td>
                           <td>
                               <form action="{{ route('brand.destroy', $brand->id) }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> edit</a>
                                   @if(Auth::user()->level->capacity == 20 || Auth::user()->level->capacity == 90)
                                   <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item')"><i class="fa fa-trash"></i> Delete</button>
                                   @endif
                               </form>
                            </td>
                       </tr>
                       @endforeach
                       {{ $brands->links() }}
                   </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection