@extends('frontend.home')
@section('title', 'Detail Pengajuan')
@section('title-content', 'Detail ' . $category->name)
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
        @foreach($responsibles as $responsible)
        @if($responsible->status == 'revision')
        <a href="{{ route('requestby.category.revision', $category->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Revisi </a>
        @break
        @elseif($responsible->status == 'waiting')
        <a href="{{ route('requestby.category.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
        @break
        @else
        @endif
        @endforeach
    </div>

    <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perihal <small>{{$request->perihal}}</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row" style="margin-bottom:20px;">
                        <div class="col-xs-12 invoice-header">
                            <h1>
                                <img src="{{ asset($request->applicant->image) }}" alt="" class="img img-avatar" style="max-width:40px;"> {{$request->applicant->name}}.
                            </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>{{ $request->code }}</b>
                          <br>
                          <br>
                          <b>Perihal:</b> {{$request->perihal}}
                          <br>
                          <b>Total:</b> {{'Rp ' . number_format($request->total)}}
                          <br>
                          <b>Terbilang:</b> {{$request->amount}}
                          <br>
                          <b>Date:</b> {{ date('g F Y', strtotime($request->start_date))}}
                          <br>
                          <b>Expire:</b> {{ date('g F Y', strtotime($request->expire_date))}}
                          <br>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Penanggungjawab</b>
                          <br>
                          <br>
                          @foreach($responsibles as $responsible)
                          <b>{{ $responsible->user->name }}:</b> <span class="btn btn-primary btn-xs">{{$responsible->status}}</span>
                          <br>
                            @endforeach
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th style="width:25%">Nama Item</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah Harga</th>
                                <th style="width:25%">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              @foreach($items as $result => $item)
                              <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $item->name . '/' . $item->merk . '/' . $item->spec}}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ number_format($item->sub) }}</td>
                                <td>{{ $item->desc }}</td>
                            </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-6 col-xs-offset-6">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Total:</th>
                                  <td>{{ 'Rp ' . number_format($request->total) }}</td>
                                </tr>
                                <tr>
                                  <th>Terbilang</th>
                                  <td>{{ $request->amount }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        
                        <div class="col-xs-12">
                        <form action="{{ route('request.pengajuan.approve') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="request_id" value="{{ $request->id }}">
                        <a href="#" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                        <?php $datas = [] ?>
                        @for($i = 0; $i < count($responsibles); $i++)
                        <?php 
                            $temp = [
                                'request_id' => $responsibles[$i]['request_id'],
                                'user_id' => $responsibles[$i]['user_id'],
                                'status' => $responsibles[$i]['status'],
                                'position' => $responsibles[$i]['position'],
                                'subject' => $responsibles[$i]['subject'],
                                'priority' => $responsibles[$i]['priority'],
                            ];
                            array_push($datas, $temp);
                        ?>
                        @endfor
                        @foreach($datas as  $data)
                        @if($data['user_id'] == Auth::id())
                            <?php $i = $loop->index - 1; ($i <= 0 ? $i = 0 : $i)?>
                            @if($datas[$i]['status'] == 'acc' || $datas[$i]['user_id'] == Auth::id())
                                <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                <button type="submit" name="status" value="cancel" class="btn btn-danger pull-right"><i class="fa fa-check-square-o"></i> Cancel</button>
                                <button type="submit" name="status" value="hold" class="btn btn-info pull-right"><i class="fa fa-check-square-o"></i> Hold</button>
                                <button type="submit" name="status" value="revision" class="btn btn-warning pull-right"><i class="fa fa-check-square-o"></i> Revisi</button>
                            @endif
                        @endif
                        @endforeach
                        </form>
                          <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>


@endsection