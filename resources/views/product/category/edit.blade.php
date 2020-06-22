@extends('frontend.home')
@section('title', 'Category Edit')
@section('title-content', 'Category Edit')
@section('content')

<div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            </div>
            @endforeach
        @endif

        @if(Session::has('success'))
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                    {!! Session('success') !!}
                </div>
            </div>
        @endif

        <div class="col-sm-12 col-md-12 col-xs-12">
            <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content"> 
                    <form action="{{ route('category.update', $category->id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left" >    
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{ $category->name }}" id="autocomplete-custom-append" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 justify-content-center">
                                <button type="reset" class="btn btn-danger">Reset Product</button>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

</div>

@endsection