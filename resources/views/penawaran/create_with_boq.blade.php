@extends('frontend.home')
@section('title', 'List Penawaran')
@section('title-content', 'List Penawaran')
@section('content')

@if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="col-md-12 col-sm-12 col-xl-12">
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    </div>
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Penawaran <small>Users</small></h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <p class="text-muted font-13 m-b-30">
                Berikut data penawaran yang harus diisi:
            </p>

            <form action="{{ route('penawaran.store') }}" method="post">
            @csrf
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-6 col-xl-6 col-md-offset-3 col-xl-offset-3">
                        @if(Auth::user()->level->capacity == 90 || Auth::user()->level->capacity == 30 || Auth::user()->level->capacity == 20)
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="user_id" class="title">Business Relation</label>
                            <select name="user_id" id="user_id" class="form-control js-example-matcher-start">
                                @foreach($users as $user)
                                @if($user->email == 'admin@mahasejahtera.com')
                                @continue
                                @endif
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @endif

                        <div class="col-xs-12 form-group has-feedback">
                            <label for="customer" class="title">User / Customer</label>
                            <input class="form-control" name="customer" value="" id="customer" type="text">
                        </div>

                        <div class="col-xs-12 form-group has-feedback">
                            <label for="perihal" class="title">Perihal</label>
                            <input class="form-control" name="perihal" value="" id="perihal" type="text">
                        </div>
                        
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="date" class="title">Date - Due date</label>
                            <input class="form-control datepick" name="date" id="date" type="text">
                        </div>
                        
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="ppn_check" class="title">PPN 10%</label>
                            <br>
                            <input type="checkbox" id="ppn_check" checked>
                        </div>

                        <div class="col-xs-12 form-group has-feedback">
                            <label for="position" class="title" class="title">Syarat</label>
                            <textarea name="syarat" id="syarat" cols="30" rows="10">Kondisi Penawaran: </textarea>
                        </div>

                        
                        
                    </div>

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="row cart-shop">
                            <div class="col-sm-12 col-md-5 col-xl-5">
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="code" class="item">Pekerjaan</label>
                                    <input class="form-control" placeholder="job" name="item[]" id="item" type="text">
                                </div>
                            </div>
                            <div class="item-price col-sm-12 col-md-3 col-xl-3">
                                <div class="col-xs-12 form-group has-feedback">
                                <label for="price" class="title">Price</label>
                                <input class="form-control price-item" value="1" name="price[]" id="price" type="text">
                                </div>
                            </div>
                            <div class="item-btn col-sm-12 col-md-2 col-xl-2">
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="sub" class="title"></label>
                                    <br>
                                    <button class="btn btn-danger btn-block delete-btn" style="margin-top:5px" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                        <br class="cart-sparator">
                        <div class="add-contain row" style="margin-top:30px;">
                            <div class="add-item addcol-sm-2 col-md-2 col-xl-2">
                                <div class="col-xs-12 form-group has-feedback">
                                <button id="add-item" class="btn btn-primary btn-block add-btn">Tambah Item</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 col-md-offset-6 col-xl-offset-6">
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="total" class="title">Sub Total</label>
                            <input class="form-control" name="subtotal" id="subtotal" type="text" readonly>
                        </div>

                        <div class="col-xs-12 form-group has-feedback ppn_check">
                            <label for="ppn" class="title">PPN 10%</label>
                            <input class="form-control" name="ppn" id="ppn" type="text" readonly>
                        </div>

                        <div class="col-xs-12 form-group has-feedback">
                            <label for="total" class="title">Total</label>
                            <input class="form-control" name="total" id="total" type="text" readonly>
                        </div>
                        
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="terbilang" class="title">Terbilang</label>
                            <input class="form-control" name="amount" id="amount" type="text" readonly>
                        </div>

                        <div class="col-xs-12 form-group has-feedback">
                            <button class="btn btn-primary">Simpan Penawaran</button>
                        </div>
                    </div>
                </div>
            </form>
            
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
        <!-- bootstrap-daterangepicker -->
        <link href="/frontend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="/frontend/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="/frontend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endsection

@section('js')
    <!-- Parsley -->
    <script src="/frontend/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Select2 -->
    <script src="/frontend/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/frontend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- Terbilang -->
    <script src="/frontend/vendors/tebilang/terbilang.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/frontend/vendors/moment/min/moment.min.js"></script>
    <script src="/frontend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- ckeditor4 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <!-- iCheck -->
    <script src="/frontend/vendors/iCheck/icheck.min.js"></script>
@endsection
@section('custom_js')
<script>
    ClassicEditor
        .create( document.querySelector( '#syarat' ) )
        .then( editor => {
        } )
        .catch( error => {
            console.error( error );
        } );

    function select2Search(){
        $(".js-example-matcher-start").each(function (index, element) {
            $(this).select2({
            matcher: function(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') { return data; }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') { return null; }

                // `params.term` is the user's search term
                // `data.id` should be checked against
                // `data.text` should be checked against
                var q = params.term.toLowerCase();
                if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                    return $.extend({}, data, true);
                }

                // Return `null` if the term should not be displayed
                return null;
            }
            });
        });
    }

    select2Search();

    $(function() {
        var start = moment();
        var end = moment().add(7, 'days');

        function cb(start, end) {

            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        }

        $('.datepick').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {

            // 'Today': [moment(), moment()],

            'Tomorrow': [moment(), moment().add(1, 'days'),],

            '7 Days': [moment(), moment().add(6, 'days')],

            '30 Days': [moment(), moment().add(29, 'days')],

            }

        }, cb);
        cb(start, end);
    });

    $(document).on('click', '#ppn_check', function(e){
        $('.ppn_check').toggle();
        updateTotal();
    });

    $(document).on('click', '.add-btn', function (e) {
            e.preventDefault();
            // console.log('ok');
            var html;
            html = 
                `
                <div class="row cart-shop">
                    <div class="col-sm-12 col-md-5 col-xl-5">
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="code" class="item">Pekerjaan</label>
                            <input class="form-control" placeholder="job" name="item[]" id="item" type="text">
                        </div>
                    </div>
                    <div class="item-price col-sm-12 col-md-3 col-xl-3">
                        <div class="col-xs-12 form-group has-feedback">
                        <label for="price" class="title">Price</label>
                        <input class="form-control price-item" value="1" name="price[]" id="price" type="text">
                        </div>
                    </div>
                    <div class="item-btn col-sm-12 col-md-2 col-xl-2">
                        <div class="col-xs-12 form-group has-feedback">
                            <label for="sub" class="title"></label>
                            <br>
                            <button class="btn btn-danger btn-block delete-btn" style="margin-top:5px" id="delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
            `

            $('.cart-sparator').before(html);
            // select2Search();
            updateTotal();
    });

    $(document).on('click', '.delete-btn', function(e){
        e.preventDefault();
        var parent = $(this).parent('.form-group').parent('.item-btn').parent('.cart-shop');
        parent.remove();
        updateTotal();
    });

    $(document).on('change', '.price-item', function () {
        if (isNaN($(this).val()) || $(this).val() <= 0) {
            $(this).val(1)
        }
        updateTotal();
    });

    function updateTotal () {
        var subtotal = 0;
        var ppn = 0;
        var total = 0;
        // console.log(total);
        $('.cart-shop').each(function () {
            var price = $(this).children('.item-price').children('.form-group').children('.price-item').val();
            subtotal = subtotal + parseFloat(price);
        });
        $('#subtotal').val(subtotal);

        if ($('.ppn_check').css('display') == 'block')
        {
            ppn = Math.round((subtotal * 10) / 100);
            $('#ppn').val(ppn);

            total = subtotal + ppn;
        }
        else
        {
            total = subtotal;
        }

        $('#total').val(total);
        $('#amount').val(terbilang(total) + ' Rupiah');
        if (isNaN(total) || total <= 0) {
            $('#amount').val('');
        }
    }
    updateTotal();
</script>
@endsection