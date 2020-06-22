@extends('frontend.home')
@section('title', 'Trash Users')
@section('title-content', 'Trash Users')
@section('content')

    @if(Session::has('success'))
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="alert alert-success" role="alert">
                {!! Session('success') !!}
            </div>
        </div>
    @endif
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Level</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($users as $result => $user)
                        <tr>
                            <td>{{ $result + $users->firstitem() }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->positions as $position)
                                    <h2><span class="btn btn-round btn-info btn-xs">{{ $position->name }}</span></h2>
                                @endforeach
                            </td>
                            <td><h2><span class="btn btn-round btn-success btn-xs">{{ $user->level->name }}</span></h2></td>
                            <td>
                                <form action="{{ route('user.permanent', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('user.restore', $user->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-history"></i> Restore</a>
                                    <button type="submit" onclick="return confirm('Are You Sure Delete Permanent This Items?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{ $users->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection