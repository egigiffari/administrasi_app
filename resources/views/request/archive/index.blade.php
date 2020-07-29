@extends('frontend.home')
@section('title', 'Archive Pengajuan')
@section('title-content', 'Archive Pengajuan')
@section('content')

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>List Pengajuan <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengaju</th>
                        <th>Pengajuan</th>
                        <th>Perihal</th>
                        <th>Total Pengajuan</th>
                        <th>Total Laporan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach($requests as $result => $pengajuan)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $pengajuan->applicant->name }}</td>
                        <td>{{ $pengajuan->categories->name }}</td>
                        <td>{{ $pengajuan->perihal }}</td>
                        <td>{{ 'Rp ' . number_format($pengajuan->total) }}</td>
                        <td>{{ 'Rp ' . number_format($pengajuan->report->total) }}</td>
                        <td>
                            <form action="{{ route('request.pengajuan.destroy', $pengajuan->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('request.pengajuan.show', $pengajuan->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> view</a>
                                <a href="{{ route('request.pengajuan.pdfreport', $pengajuan->id) }}" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i> Download Pdf</a>
                                @if(Auth::user()->level->capacity == 90)
                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item')"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>


@endsection

@section('css')
<!-- Datatables -->
    <link href="/frontend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('js')
<!-- Chart.js -->
    <script src="/frontend/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- Datatables -->
    <script src="/frontend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/frontend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/frontend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/frontend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/frontend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/frontend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/frontend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/frontend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/frontend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/frontend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/frontend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/frontend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/frontend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/frontend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/frontend/vendors/pdfmake/build/vfs_fonts.js"></script>

@endsection
@section('custom_js')
@endsection