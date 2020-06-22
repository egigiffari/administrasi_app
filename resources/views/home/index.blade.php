@extends('frontend.home')
@section('title', 'Dashboard')
@section('title-content', 'Dashboard')
@section('content')
    <div class="row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-group"></i>
            </div>
            <div class="count">20</div>

            <h3>Suppliers</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-cube"></i>
            </div>
            <div class="count">100</div>

            <h3>Brands</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-cubes"></i>
            </div>
            <div class="count">179</div>

            <h3>Products</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-exchange"></i>
            </div>
            <div class="count">179</div>

            <h3>Transaction</h3>
        </div>
        </div>
    </div>
@endsection