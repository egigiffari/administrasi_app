@extends('frontend.home')
@section('title', 'Created Position')
@section('title-content', 'Created Position')
@section('content')

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('position.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('position.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">    
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6 col-md-offset-3">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Position</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="position" class="title">Name</label>
                                <input class="form-control" name="name" id="inputSuccess6" type="text" placeholder="Name">
                            </div>
        
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="position" class="title">Division</label>
                                <select name="division_id" class="form-control">
                                    <option value="">Please Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Save Position</button>
                            </div>            
                        </div> 
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection