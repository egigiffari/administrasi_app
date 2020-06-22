@extends('frontend.home')
@section('title', 'Level')
@section('title-content', 'Level')
@section('content')

<br>
    <a href="{{ route('level.create') }}" class="btn btn-primary">Add New Level</a>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Level</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>level</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($levels as $result => $level)
                            <tr>
                                <td>{{ $result + $levels->firstitem() }}</td>
                                <td>{{ $level->name }}</td>
                                <td>{{ $level->capacity }}</td>
                                <td>
                                    <form action="{{ route('level.destroy', $level->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('level.edit', $level->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <button type="submit" onclick="return confirm('Are You Sure Delete This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $levels->links() }}
            </div>
        </div>
    </div>

@endsection