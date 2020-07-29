@extends('frontend.home')
@section('title', 'Dashboard')
@section('title-content', 'Dashboard')
@section('content')

<div class="row">


@if(Auth::user()->level->capacity == 90 || Auth::user()->level->capacity == 30 || Auth::user()->level->capacity == 20)
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-group"></i>
                </div>
                <div class="count">{{ count($users) }}</div>

                <h3>Users</h3>
            </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-suitcase"></i>
                </div>
                <div class="count">{{ count($divisions) }}</div>

                <h3>Division</h3>
            </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-text-o"></i>
                </div>
                <div class="count">{{ count($pengajuans) }}</div>

                <h3>Pengajuan</h3>
            </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-exchange"></i>
                </div>
                <div class="count">{{ count($pengajuan_acc) }}</div>

                <h3>Pengajuan Acc</h3>
            </div>
            </div>
        </div>
    </div>
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
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Update</th>
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
                        <td>
                            @if($pengajuan->status == 'on proses')
                            <button class="btn btn-info btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'revision')
                            <button class="btn btn-warning btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'perbaikan')
                            <button class="btn btn-warning btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'hold')
                            <button class="btn btn-danger btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'approve')
                            <button class="btn btn-success btn-xs">{{ $pengajuan->status }}</button>
                            @endif
                        </td>
                        <td>{{ 'Rp ' . number_format($pengajuan->total) }}</td>
                        <td>{{ $pengajuan->updated_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('request.pengajuan.destroy', $pengajuan->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('request.pengajuan.show', $pengajuan->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> view</a>
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
@elseif(Auth::user()->level->capacity == 10)

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
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach($pengajuan_user as $result => $pengajuan)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $pengajuan->applicant->name }}</td>
                        <td>{{ $pengajuan->categories->name }}</td>
                        <td>{{ $pengajuan->perihal }}</td>
                        <td>
                            @if($pengajuan->status == 'on proses')
                            <button class="btn btn-info btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'revision')
                            <button class="btn btn-warning btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'perbaikan')
                            <button class="btn btn-warning btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'hold')
                            <button class="btn btn-danger btn-xs">{{ $pengajuan->status }}</button>
                            @elseif($pengajuan->status == 'approve')
                            <button class="btn btn-success btn-xs">{{ $pengajuan->status }}</button>
                            @endif
                        </td>
                        <td>{{ 'Rp ' . number_format($pengajuan->total) }}</td>
                        <td>{{ $pengajuan->updated_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('request.pengajuan.destroy', $pengajuan->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('request.pengajuan.show', $pengajuan->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> view</a>
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

@endif

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
    <!-- <script>
        var ctx = document.getElementById("canvasDoughnut");
			  var data = {
				labels: [
                    <?php 
                    foreach ($categories as $category)
                        echo('"' . $category->name . '"' . ',');
                    ?>
				],
				datasets: [{
				  data: [120, 50, 140, 180, 100],
				  backgroundColor: [
					"#455C73",
					"#9B59B6",
					"#BDC3C7",
					"#26B99A",
					"#3498DB"
				  ],
				  hoverBackgroundColor: [
					"#34495E",
					"#B370CF",
					"#CFD4D8",
					"#36CAAB",
					"#49A9EA"
				  ]

				}]
			  };

			  var canvasDoughnut = new Chart(ctx, {
				type: 'doughnut',
				tooltipFillColor: "rgba(51, 51, 51, 0.55)",
				data: data
			  });
    </script> -->
@endsection