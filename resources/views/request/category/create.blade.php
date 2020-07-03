@extends('frontend.home')
@section('title', 'Created Ketegori Pengajuan')
@section('title-content', 'Created Ketegori Pengajuan')
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
        <a href="{{ route('request.category.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('request.category.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">    
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Ketegori Pengajuan</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="name" class="title">Name</label>
                                <input class="form-control" name="name" id="inputSuccess6" type="text" placeholder="Name">
                            </div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="title">Code</label>
                                <input class="form-control" name="code" id="inputSuccess6" type="text" placeholder="Code">
                            </div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="position" class="title">Tipe</label>
                                <select name="type" class="form-control">
                                    <option value="">Please Select type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
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
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="position" class="title" class="title">Syarat</label>
                                <textarea name="syarat" id="syarat" cols="30" rows="10"></textarea>
                            </div>
        
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Save Category</button>
                            </div>            
                        </div> 
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section('css')
    <!-- <link rel="stylesheet" href="/frontend/vendors/ckeditor/contents.css">
    <link rel="stylesheet" href="/frontend/vendors/ckeditor/moono-lisa/editor.css" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/vendors/ckeditor/moono-lisa/editor_gecko.css" rel="stylesheet"> -->
@endsection

@section('js')
    <!-- ckeditor4 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script  type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#syarat' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
@endsection