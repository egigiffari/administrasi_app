@extends('frontend.home')
@section('title', 'Kategori Pengajuan')
@section('title-content', 'Kategori Pengajuan')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        </div>
        @endforeach
    @endif

<br>
    <a href="{{ route('request.category.create') }}" class="btn btn-primary">Add New Category</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Category</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Division</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $result => $category)
                            <tr>
                                <td>{{ $result + $categories->firstitem() }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->code }}</td>
                                <td>{{ $category->types->name }}</td>
                                <td>{{ $category->division->name }}</td>
                                <td>
                                    <form action="{{ route('request.category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('request.category.edit', $category->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        @if(Auth::user()->level->capacity == 90)
                                        <button type="submit" onclick="return confirm('Are You Sure Delete This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection