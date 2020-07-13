@extends('frontend.home')
@section('title', 'Created Level')
@section('title-content', 'Created Level')
@section('content')

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('level.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('level.update', $level->id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">    
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6 offset-md-3">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Level</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="level" class="title">Name</label>
                                <input class="form-control" value="{{ $level->name }}" name="name" id="inputSuccess6" type="text" placeholder="Name">
                            </div>

                            <div class="col-xs-12 form-group has-feedback">
                                <label for="level" class="title">Capacity</label>
                                <input class="form-control" value="{{ $level->capacity }}" name="capacity" id="inputSuccess6" type="number" placeholder="Capacity">
                                <span class="text-danger">User : 10, Common Admin : 20, Manager : 30, Administrator : 90</span>
                            </div>
        
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Save Level</button>
                            </div>            
                        </div> 
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection