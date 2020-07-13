@extends('frontend.home')
@section('title', 'List Penawaran')
@section('title-content', 'List Penawaran')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Penawaran <small>Users</small></h2>
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
                Berikut data penawaran yang harus dibuat:
            </p>
            
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
@endsection
@section('js')
@endsection
@section('custom_js')
@endsection