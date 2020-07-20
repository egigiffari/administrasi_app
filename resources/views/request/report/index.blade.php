@extends('frontend.home')
@section('title', 'Laporan ' . $category->name)
@section('title-content', 'Laporan ' . $category->name)
@section('content')

        @if(Session::has('success'))
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                    {!! Session('success') !!}
                </div>
            </div>
        @endif

    <br>
    <br>
    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Laporan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                   <thead>
                       <th>Date</th>
                       <th>Pengaju</th>
                       <th>Code</th>
                       <th>Laporan</th>
                       <th>Status</th>
                       <th>Nilai</th>
                       <th>Action</th>
                   </thead>
                   <tbody>
                       @foreach($reports as $result => $report)
                       <tr>
                           <td>{{ $report->updated_at->diffForHumans() }}</td>
                           <td>{{ $report->applicant->name }}</td>
                           <td>{{ $report->request->code }}</td>
                           <td>{{ $report->categories->name }}</td>
                           <td><button class="btn btn-info btn-xs">{{ $report->status }}</button></td>
                           <td>{{ 'Rp ' . number_format($report->total) }}</td>
                           <td>
                               <form action="{{ route('request.report.destroy', $report->id) }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <a href="{{ route('request.report.show', $report->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a>
                                   <!-- <a href="{{ route('request.report.show', $report->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a> -->
                                   @if(!preg_match('/user/i', Auth::user()->level->name))
                                   <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item')"><i class="fa fa-trash"></i> Delete</button>
                                   @endif
                               </form>
                            </td>
                       </tr>
                       @endforeach
                       {{ $reports->links() }}
                   </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection