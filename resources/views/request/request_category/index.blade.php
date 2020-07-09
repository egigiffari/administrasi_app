@extends('frontend.home')
@section('title', $category->name)
@section('title-content', $category->name)
@section('content')

        @if(Session::has('success'))
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                    {!! Session('success') !!}
                </div>
            </div>
        @endif

    <br>
    <a href="{{ route('requestby.category.create', $category->id) }}" class="btn btn-primary">Add New Pengajuan</a>
    <br>
    <div class="row">
        <div class="contain-content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Pengajuan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                       <thead>
                           <th>Date</th>
                           <th>Pengaju</th>
                           <th>Code</th>
                           <th>Pengajuan</th>
                           <th>Status</th>
                           <th>Nilai</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @foreach($requests as $result => $request)
                           <tr>
                               <td>{{ $request->updated_at->diffForHumans() }}</td>
                               <td>{{ $request->applicant->name }}</td>
                               <td>{{ $request->code }}</td>
                               <td>{{ $request->categories->name }}</td>
                               <td><button class="btn btn-info btn-xs">{{ $request->status }}</button></td>
                               <td>{{ 'Rp ' . number_format($request->total) }}</td>
                               <td>
                                   <form action="{{ route('request.pengajuan.destroy', $request->id) }}" method="post">
                                       @csrf
                                       @method('delete')
                                       <a href="{{ route('request.pengajuan.show', $request->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> view</a>
                                       @if(Auth::user()->level->capacity == 90)
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item')"><i class="fa fa-trash"></i> Delete</button>
                                        @endif
                                   </form>
                                </td>
                           </tr>
                           @endforeach
                           {{ $requests->links() }}
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection