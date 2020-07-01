@extends('frontend.home')
@section('title', 'Tipe Pengajuan')
@section('title-content', 'Tipe Pengajuan')
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
    <a href="{{ route('request.type.create') }}" class="btn btn-primary">Add New Tipe</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Type</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($types as $result => $type)
                            <tr>
                                <td>{{ $result + $types->firstitem() }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <form action="{{ route('request.type.destroy', $type->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('request.type.edit', $type->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        @if(Auth::user()->level->capacity == 90)
                                        <button type="submit" onclick="return confirm('Are You Sure Delete This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $types->links() }}
            </div>
        </div>
    </div>

@endsection