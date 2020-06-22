@extends('frontend.home')
@section('title', 'Division')
@section('title-content', 'Division')
@section('content')

<br>
    <a href="{{ route('division.create') }}" class="btn btn-primary">Add New Division</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List division</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Division</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($divisions as $result => $division)
                            <tr>
                                <td>{{ $result + $divisions->firstitem() }}</td>
                                <td>{{ $division->name }}</td>
                                <td>
                                    <form action="{{ route('division.destroy', $division->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('division.edit', $division->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <button type="submit" onclick="return confirm('Are You Sure Delete This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $divisions->links() }}
            </div>
        </div>
    </div>

@endsection