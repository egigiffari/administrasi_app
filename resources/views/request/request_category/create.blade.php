@extends('frontend.home')
@section('title', 'Created Pengajuan')
@section('title-content', 'Created ' . $category->name)
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

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('requestby.category.index', $category->id) }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <form action="{{ route('requestby.category.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">    
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <input type="hidden" name="creator_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6 col-md-offset-3 col-sm-offset-0">

                            @if(Auth::user()->level->capacity == 10)
                                <input type="hidden" name="applicant_id" value="{{ Auth::id() }}">
                            @else
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="applicant_id" class="title">Business Relation</label>
                                    <select name="applicant_id" id="applicant_id" class="form-control js-example-matcher-start">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            @endif


                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="title">Code</label>
                                <input class="form-control" name="code" value="{{ $code }}" id="code" type="text" readonly>
                            </div>

                            <div class="col-xs-12 form-group has-feedback">
                                <label for="date" class="title">Date</label>
                                <input class="form-control datepick" name="date" id="date" type="text">
                            </div>
                            
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="perihal" class="title">Perihal</label>
                                <input class="form-control" name="perihal" id="perihal" type="text">
                            </div>
         
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="ln_solid"></div>
                        </div>
                    </div>

                    <!-- PEMBELIAN BARANG/MATERIAL/TOOLS -->
                    <div class="row">
                        <div class="col-12">        
                            @if(preg_match('/pembelian/i', $category->types->name))
                                <div class="row cart-shop">
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="item" class="title">Nama Barang</label>
                                            <select name="item[]" id="item" class="items form-control js-example-matcher-start">
                                                <option value="">Please Select Code Item</option>
                                                @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->code . '/' . $item->name . '/' . "Rp " . number_format($item->last_price) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="code" class="unit">Satuan</label>
                                            <input class="form-control" value="unit" name="unit[]" id="unit" type="text">
                                        </div>
                                    </div>
                                    <div class="item-qty col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="qty" class="title">Qty</label>
                                        <input class="form-control qty" value="1" name="qty[]" id="qty" type="number">
                                        </div>
                                    </div>
                                    <div class="item-price col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="price" class="title">Price</label>
                                        <input class="form-control price-item" value="0" name="price[]" id="price" type="text">
                                        </div>
                                    </div>
                                    <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="sub" class="title">Sub Price</label>
                                        <input class="form-control sub" value="0" name="sub[]" id="sub" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="desc" class="title">Keterangan</label>
                                        <input class="form-control desc" value="" name="desc[]" id="desc" type="text">
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
                            @elseif(preg_match('/biaya/i', $category->types->name))
                                <div class="row cart-shop">
                                    <input class="form-control" value="0" name="item[]" id="item" type="hidden" readonly>
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="code" class="unit">Name</label>
                                            <input class="form-control" value="name" name="name[]" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="code" class="unit">Merk</label>
                                            <input class="form-control" value="merk" name="merk[]" id="merk" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="code" class="unit">Spesifikasi</label>
                                            <input class="form-control" value="spec" name="spec[]" id="spec" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                            <label for="code" class="unit">Satuan</label>
                                            <input class="form-control" value="unit" name="unit[]" id="unit" type="text">
                                        </div>
                                    </div>
                                    <div class="item-qty col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="qty" class="title">Qty</label>
                                        <input class="form-control qty" value="1" name="qty[]" id="qty" type="number">
                                        </div>
                                    </div>
                                    <div class="item-price col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="price" class="title">Price</label>
                                        <input class="form-control price-item" value="0" name="price[]" id="price" type="text">
                                        </div>
                                    </div>
                                    <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="sub" class="title">Sub Price</label>
                                        <input class="form-control sub" value="0" name="sub[]" id="sub" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                                        <div class="col-xs-12 form-group has-feedback">
                                        <label for="desc" class="title">Keterangan</label>
                                        <input class="form-control desc" value="" name="desc[]" id="desc" type="text">
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
                            @else
                            @endif
                            <br class="cart-sparator">
                            <div class="add-contain row" style="margin-top:30px;">
                                <div class="add-item addcol-sm-2 col-md-2 col-xl-2">
                                    <div class="col-xs-12 form-group has-feedback">
                                    <button id="add-item" class="btn btn-primary btn-block add-btn">Tambah Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PEMBELIAN BARANG/MATERIAL/TOOLS -->
                    <div class="row">
                        <div class="col-12">
                            <div class="ln_solid"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-xl-4 col-md-offset-8 col-xl-offset-8">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="total" class="title">Total</label>
                                <input class="form-control" name="total" id="total" value="0" type="text" readonly>
                            </div>

                            <div class="col-xs-12 form-group has-feedback">
                                <label for="amount" class="title">Terbilang</label>
                                <input class="form-control" name="amount" id="amount" type="text" readonly>
                            </div>

                            <div class="col-xs-12 form-group">
                                <button class="btn btn-primary">Create Pengajuan</button>
                            </div>  
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section('css')
        <!-- bootstrap-daterangepicker -->
        <link href="/frontend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="/frontend/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
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
    <script>

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

    </script>
    <script>

        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();

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

    </script>

    <script>

        $(function () {
             
            $(document).on('change', '.qty', function () {
                if (isNaN($(this).val()) || $(this).val() <= 0) {
                    $(this).val(1)
                }
                updateTotal();
            });

            $(document).on('change', '.price-item', function () {
                if (isNaN($(this).val()) || $(this).val() <= 0) {
                    $(this).val(1)
                }
                updateTotal();
            });

            $(document).on('click', '.delete-btn', function(e){
                e.preventDefault();
                var parent = $(this).parent('.form-group').parent('.item-btn').parent('.cart-shop');
                parent.remove();
                updateTotal();
            });

            $(document).on('click', '.add-btn', function (e) {
                e.preventDefault();
                var html;
                <?php if(preg_match('/pembelian/', $category->types->name)) : ?> 
                html = 
                    `
                    <div class="row cart-shop">
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="item" class="title">Nama Barang</label>
                                <select name="item[]" id="item" class="items form-control js-example-matcher-start">
                                    <option value="">Please Select Code Item</option>
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->code . '/' . $item->name . '/' . "Rp " . number_format($item->last_price) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="unit">Satuan</label>
                                <input class="form-control" value="unit" name="unit[]" id="unit" type="text">
                            </div>
                        </div>
                        <div class="item-qty col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="qty" class="title">Qty</label>
                            <input class="form-control qty" value="1" name="qty[]" id="qty" type="number">
                            </div>
                        </div>
                        <div class="item-price col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="price" class="title">Price</label>
                            <input class="form-control price-item" value="0" name="price[]" id="price" type="text">
                            </div>
                        </div>
                        <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="sub" class="title">Sub Price</label>
                            <input class="form-control sub" value="0" name="sub[]" id="sub" type="text" readonly>
                            </div>
                        </div>
                        <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="desc" class="title">Keterangan</label>
                            <input class="form-control desc" value="" name="desc[]" id="desc" type="text">
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
                <?php elseif(preg_match('/biaya/', $category->types->name)) : ?>
                html = 
                `
                    <div class="row cart-shop">
                        <input class="form-control" value="0" name="item[]" id="item" type="hidden" readonly>
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="unit">Name</label>
                                <input class="form-control" value="name" name="name[]" id="name" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="unit">Merk</label>
                                <input class="form-control" value="merk" name="merk[]" id="merk" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="unit">Spesifikasi</label>
                                <input class="form-control" value="spec" name="spec[]" id="spec" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="code" class="unit">Satuan</label>
                                <input class="form-control" value="unit" name="unit[]" id="unit" type="text">
                            </div>
                        </div>
                        <div class="item-qty col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="qty" class="title">Qty</label>
                            <input class="form-control qty" value="1" name="qty[]" id="qty" type="number">
                            </div>
                        </div>
                        <div class="item-price col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="price" class="title">Price</label>
                            <input class="form-control price-item" value="0" name="price[]" id="price" type="text">
                            </div>
                        </div>
                        <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="sub" class="title">Sub Price</label>
                            <input class="form-control sub" value="0" name="sub[]" id="sub" type="text" readonly>
                            </div>
                        </div>
                        <div class="item-sub col-sm-12 col-md-2 col-xl-2">
                            <div class="col-xs-12 form-group has-feedback">
                            <label for="desc" class="title">Keterangan</label>
                            <input class="form-control desc" value="" name="desc[]" id="desc" type="text">
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

                <?php endif; ?>

                $('.cart-sparator').before(html);
                select2Search();
            });
            
            function updateTotal () {
                var total = 0;
                $('.cart-shop').each(function(index, element){
                    let qty = $(this).children('.item-qty').children('.form-group').children('.qty').val();
                    let price = $(this).children('.item-price').children('.form-group').children('.price-item').val();
                    let subtotal = parseFloat(qty) * parseFloat(price) ;
                    total = total + subtotal;
                    total = Math.round(total * 100) / 100;

                    var sub = $(this).children('.item-sub').children('.form-group').children('.sub');
                    sub.val(subtotal);
                });
                $('#total').val(total);
                $('#amount').val(terbilang(total) + ' Rupiah');
                if (isNaN(total) || total <= 0) {
                $('#amount').val('');
                }
                    
            }

        });


        

    </script>

@endsection

