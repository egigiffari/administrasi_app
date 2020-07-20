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
          @if($responsible->status == 'waiting' || $responsible->status == 'perbaikan')
          <a href="{{ route('requestby.category.edit', $request->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
          @break
          @elseif($responsible->status == 'revision')
          <a href="{{ route('requestby.category.revision', $request->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Revisi </a>
          @break
          @elseif($responsible->status == 'hold')
          <span>Please Contact Admin For Information Because Your Request is <strong class="text-danger">Hold</strong></span>
          @break
          @else
          @endif
        @endforeach
    </div>

    <div class="row">
      <!-- <div class="contain-content"></div> -->
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
                <div class="col-sm-4 invoice-col" style="margin-bottom: 20px;">
                  <b>{{ $request->code }}</b>
                  <br>
                  <br>
                  <b>Status Pengajuan:</b>
                      @if($request->status == 'waiting')
                      <span class="btn btn-primary btn-xs">{{$request->status}}</span>
                      @elseif($request->status == 'revision')
                      <span class="btn btn-warning btn-xs">{{$request->status}}</span>
                      @elseif($request->status == 'perbaikan')
                      <span class="btn btn-danger btn-xs">{{$request->status}}</span>
                      @elseif($request->status == 'hold')
                      <span class="btn btn-info btn-xs">{{$request->status}}</span>
                      @elseif($request->status == 'acc')
                      <span class="btn btn-success btn-xs">{{$request->status}}</span>
                      @endif
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
                  
                  <b>Penanggung Jawab</b>
                  <br>
                  <br>
                  @foreach($responsibles as $responsible)
                    <b>{{ $responsible->position }}:</b>
                    @if($responsible->status == 'waiting')
                    <span class="btn btn-primary btn-xs">{{$responsible->status}}</span>
                    @elseif($responsible->status == 'revision')
                    <span class="btn btn-warning btn-xs">{{$responsible->status}}</span>
                    @elseif($responsible->status == 'perbaikan')
                    <span class="btn btn-danger btn-xs">{{$responsible->status}}</span>
                    @elseif($responsible->status == 'hold')
                    <span class="btn btn-info btn-xs">{{$responsible->status}}</span>
                    @elseif($responsible->status == 'acc')
                    <span class="btn btn-success btn-xs">{{$responsible->status}}</span>
                    @endif
                    <br>
                  @endforeach
                </div>
                <!-- /.col -->
                @if($request->catatan != '')
                  <div class="col-sm-4 invoice-col">
                    
                    <b>Catatan</b>
                    <br>
                    <br>
                    <span class="text-danger">{{$request->catatan}}</span>
                  </div>
                @endif
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
              <div class="table-overflow">
                <div class="table">
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

              </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- /.col -->
                <div class="col-xs-12 col-md-6 col-md-offset-6">
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
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <input type="hidden" name="request_id" value="{{ $request->id }}">
                          <a href="{{route('requestby.category.pdf', $request->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                          @if($request->status == 'approve')
                            @if(!$request->report)
                              @if($request->applicant_id == Auth::id() || Auth::user()->level->capacity == 90 || Auth::user()->level->capacity == 20)
                            <a href="{{route('request.report.create', $request->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-file-text"></i> Buat Laporan</a>
                              @endif
                            @else
                            <a href="{{route('request.report.show', $request->report->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Laporan</a>
                            @endif
                          @endif
                        </div>
                        <div class="col-md-6 col-xs-12">
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
                                  @if($datas[$loop->index]['status'] == 'waiting')
                                  <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                  <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                  @elseif($datas[$loop->index]['status'] == 'acc')
                                  <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                  <div name="status" value="perbaikan" class="btn btn-warning pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Perbaikan</div>
                                  @elseIf($datas[$loop->index]['status'] == 'revision')
                                  <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                  <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                  @elseIf($datas[$loop->index]['status'] == 'hold')
                                  <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                  <div name="status" value="perbaikan" class="btn btn-warning pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Perbaikan</div>
                                  @endif
                              @endif
                          @elseif(Auth::user()->level->name == 'administrator' || Auth::user()->email == 'superadmin@gmail.com')
                            <button type="submit" name="status" value="all-acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                            <button type="submit" name="status" value="all-revision" class="btn btn-warning pull-right"><i class="fa fa-check-square-o"></i> Revisi</button>
                            <button type="submit" name="status" value="all-reset" class="btn btn-primary pull-right"><i class="fa fa-history"></i> Reset</button>
                            @break
                          @endif
                          @endforeach
                        </div>
                    </div>
                </form>
                  <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
                  <!-- Modal -->
                  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('request.pengajuan.approve')}}" method="post">
                          <div class="modal-body">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <label class="control-label">Keterangan <span class="required">*</span>
                                </label>
                                <div class="">
                                <textarea class="form-control" rows="3" name="catatan"></textarea>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button id="btn-confirm" type="submit" name="status" value="perbaikan" class="btn btn-warning">Perbaikan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
    </div>


@endsection
@section('js')
  <script>
    $(function () {
      $('.btn-confirm').click(function (e) { 
        e.preventDefault();
        var btnConfirm = $(this);
        var btnChange = $('#btn-confirm');

        btnChange.attr('name', btnConfirm.attr('name'));
        btnChange.val(btnConfirm.attr('value'));
        btnChange.removeClass().addClass(btnConfirm.attr('class'));
        btnChange.html(btnConfirm.html());
      });
    });
  </script>
@endsection