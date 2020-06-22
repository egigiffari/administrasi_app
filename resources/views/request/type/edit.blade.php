@extends('frontend.home')
@section('title', 'Edit Tipe Pengajuan')
@section('title-content', 'Edit Tipe Pengajuan')
@section('content')

        @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            </div>
            @endforeach
        @endif

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('request.type.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('request.type.update', $type->id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left">    
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6 col-md-offset-3">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Tipe Pengajuan</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="name" class="title">Name</label>
                                <input class="form-control" value="{{ $type->name }}" name="name" id="inputSuccess1" type="text" placeholder="Name">
                            </div>        
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Save Type</button>
                            </div>            
                        </div> 
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection