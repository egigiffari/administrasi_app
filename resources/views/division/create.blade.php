@extends('frontend.home')
@section('title', 'Created Division')
@section('title-content', 'Created Division')
@section('content')

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('division.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('division.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">    
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6 col-md-offset-3">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Division</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="division" class="title">Name</label>
                                <input class="form-control" name="name" id="inputSuccess6" type="text" placeholder="Name">
                            </div>
        
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Save Division</button>
                            </div>            
                        </div> 
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection