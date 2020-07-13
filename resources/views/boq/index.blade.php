@extends('frontend.home')
@section('title', 'List BoQ')
@section('title-content', 'List BoQ')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>BoQ <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <p class="text-muted font-13 m-b-30">
                Berikut data BoQ yang pernah dibuat: <code>BoQ list</code>
            </p>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>User / Customer</th>
                    <th>Pekerjaan</th>
                    <th>Nilai</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>$320,800</td>
                    <td>2011/04/25</td>
                    <td>
                        <form action="#" method="post">
                        <a href="#" class='btn btn-warning btn-xs'>Detail</a>
                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Item');">Delete</button>
                        </form>
                    </td>
                </tr>
                
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