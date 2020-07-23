@extends('frontend.home')
@section('title', 'Setting Laporan')
@section('title-content', 'Setting Laporan')
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

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('report.setting.update', $report->id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left">    
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div class="profile_title">
                                <div class="col-md-6"><h2>Setting Laporan</h2></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="position" class="title" class="title">Syarat</label>
                                <textarea name="syarat" id="syarat" cols="30" rows="10">{!! $report->syarat !!}</textarea>
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