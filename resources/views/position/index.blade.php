@extends('frontend.home')
@section('title', 'Position')
@section('title-content', 'Position')
@section('content')

<br>
    <a href="{{ route('position.create') }}" class="btn btn-primary">Add New Position</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Position</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Position</th>
                        <th>Division</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($positions as $result => $position)
                            <tr>
                                <td>{{ $result + $positions->firstitem() }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->division->name }}</td>
                                <td>
                                    <form action="{{ route('position.destroy', $position->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('position.edit', $position->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <button type="submit" onclick="return confirm('Are You Sure Delete This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $positions->links() }}
            </div>
        </div>
    </div>

@endsection