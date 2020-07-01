@extends('frontend.home')
@section('title', 'Categories')
@section('title-content', 'Categories')
@section('content')

        @if(Session::has('success'))
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                    {!! Session('success') !!}
                </div>
            </div>
        @endif
    <br>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Categories</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                   <thead>
                       <th>No</th>
                       <th>Name</th>
                       <th>Slug</th>
                       <th>Action</th>
                   </thead>
                   <tbody>
                       @foreach($categories as $result => $category)
                       <tr>
                           <td>{{ $result + $categories->firstitem() }}</td>
                           <td>{{ $category->name }}</td>
                           <td>{{ $category->slug }}</td>
                           <td>
                               <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> edit</a>
                                   @if(Auth::user()->level->capacity == 20 || Auth::user()->level->capacity == 90)
                                   <button id="delete-item" onclick="return confirm('Are You Sure Delete This Item?');" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> Delete</button>
                                   @endif
                               </form>
                            </td>
                       </tr>
                       @endforeach
                       {{$categories->links()}}
                   </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
