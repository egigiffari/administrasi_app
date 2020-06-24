@extends('frontend.home')
@section('title', 'Product Create')
@section('title-content', 'Product Create')
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
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content"> 
                    <form action="{{ route('product.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">    
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk">Merk Product <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="autocomplete-custom-append" name="merk" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Product Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="type" name="type" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Spesification <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="3" name="spec"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Satuan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="unit" name="unit" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Product</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="category[]" class="form-control select2_multiple form-control" multiple="multiple">
                                @foreach($product_types as $product_type)
                                <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 justify-content-center">
                                <button type="reset" class="btn btn-danger">Reset Product</button>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Select2 -->
    <link href="/frontend/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- Parsley -->
    <script src="/frontend/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Select2 -->
    <script src="/frontend/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/frontend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

    <script>

        $(function () {
            var merk = [
                <?php foreach($brands as $brand) : ?>
                    "<?php echo($brand->name) ?>",
                <?php endforeach ?>
            ];
            $('#autocomplete-custom-append').autocomplete({
                lookup: merk
            });

            $('.select2_multiple').select2();
            
        });
  </script>

@endsection