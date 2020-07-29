@extends('frontend.home')
@section('title', 'Detail Laporan Pengajuan')
@section('title-content', 'Detail Laporan ' . $category->name)
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
          <a href="{{ route('requestby.category.edit', $report->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
          @break
          @elseif($responsible->status == 'revision')
          <a href="{{ route('requestby.category.revision', $report->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Revisi </a>
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
            <h2>Perihal <small>{{$report->perihal}}</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row" style="margin-bottom:20px;">
                <div class="col-xs-12 invoice-header">
                    <h1>
                        <img src="{{ asset($report->applicant->image) }}" alt="" class="img img-avatar" style="max-width:40px;"> {{$report->applicant->name}}.
                    </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>{{ $report->request->code }}</b>
                    <br>
                    <br>
                    <b>Status Pengajuan:</b>
                        @if($report->status == 'on proses')
                        <span class="btn btn-primary btn-xs">{{$report->status}}</span>
                        @elseif($report->status == 'revision')
                        <span class="btn btn-warning btn-xs">{{$report->status}}</span>
                        @elseif($report->status == 'perbaikan')
                        <span class="btn btn-danger btn-xs">{{$report->status}}</span>
                        @elseif($report->status == 'hold')
                        <span class="btn btn-info btn-xs">{{$report->status}}</span>
                        @elseif($report->status == 'approve')
                        <span class="btn btn-success btn-xs">{{$report->status}}</span>
                        @endif
                    <br>
                    <b>Perihal:</b> {{$report->perihal}}
                    <br>
                    <b>Dana Pengajuan:</b> {{ 'Rp ' . number_format($report->request->total)}}
                    <br>
                    <b>Total:</b> {{'Rp ' . number_format($report->total)}}
                    <br>
                    <b>Terbilang:</b> {{$report->amount}}
                    <br>
                    <b>Tanggal Pengajuan:</b> {{ date('g F Y', strtotime($report->request->start_date))}}
                    <br>
                </div>
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
                @if($report->catatan != '')
                    <div class="col-sm-4 invoice-col">
                    
                    <b>Catatan</b>
                    <br>
                    <br>
                    <span class="text-danger">{{$report->catatan}}</span>
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

              <!-- Row -->
              <div class="row">
                <!-- /.col -->
                <div class="col-xs-12 col-md-6 col-md-offset-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="width:50%">Total:</th>
                          <td>{{ 'Rp ' . number_format($report->total) }}</td>
                        </tr>
                        <tr>
                          <th>Terbilang</th>
                          <td>{{ $report->amount }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Row -->
              <div class="row">
                <!-- /.col -->
                <div class="col-xs-12 col-sm-12" style="margin-bottom:20px;">
                    <p>Please insert Your Bill</p>
                    <form action="{{ route('report.bill.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="report_id" value="{{ $report->id }}">
                        <div class="form-group col-12">
                            <label class="control-label" for="image">Image <span class="required">*('jpg/jpeg only')</span>
                            </label>
                            <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="form-group col-12">
                        <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
                @foreach($report->bills as $bill)
                <div class="col-md-55">
                    <div class="thumbnail">
                    <div class="image view view-first">
                        <img style="width: 100%; display: block;" src="{{asset($bill->bill)}}" alt="image" />
                        <div class="mask">
                        <p>...</p>
                        <div class="tools tools-bottom">
                            
                        </div>
                        </div>
                    </div>
                    <div class="caption">
                        <form action="{{ route('report.bill.destroy', $bill->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are You Sure Delete This Item?')" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    </div>
                </div>
                @endforeach <!--THIS INPUT BILL STILL COMMENT -->
                <!-- /.col -->
              </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                        
                    <div class="col-xs-12">
                    <form action="{{ route('request.report.approve') }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="report_id" value="{{ $report->id }}">
                    <a href="{{route('request.report.pdf', $report->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                    <a href="{{route('requestby.category.show', $report->request->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Pengajuan </a>
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
                    <!-- Check if bill is not null -->
                    {{-- @if(count($report->bills) != 0) --}} <!-- This Blade still comment -->
                    @if(count($report->bills) != 0) <!-- This Blade is Work -->

                        <!-- Loop responsible -->
                        @foreach($datas as  $data)
                        @if($data['user_id'] == Auth::id())
                            <?php $i = $loop->index - 1; ($i <= 0 ? $i = 0 : $i)?>
                            @if($datas[$i]['status'] == 'acc' || $datas[$i]['user_id'] == Auth::id())
                                @if($datas[$loop->index]['status'] == 'waiting')
                                <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                @break
                                @elseif($datas[$loop->index]['status'] == 'acc')
                                <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                <div name="status" value="perbaikan" class="btn btn-warning pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Perbaikan</div>
                                @break
                                @elseIf($datas[$loop->index]['status'] == 'revision')
                                <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                <div name="status" value="hold" class="btn btn-info pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Hold</div>
                                @break
                                @elseIf($datas[$loop->index]['status'] == 'hold')
                                <button type="submit" name="status" value="acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                                <div name="status" value="perbaikan" class="btn btn-warning pull-right btn-confirm" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check-square-o"></i> Perbaikan</div>
                                @break
                                @endif
                            @endif
                        @elseif(Auth::user()->level->name == 'administrator' || Auth::user()->email == 'superadmin@gmail.com')
                            <button type="submit" name="status" value="all-acc" class="btn btn-success pull-right"><i class="fa fa-check-square-o"></i> Acc</button>
                            <button type="submit" name="status" value="all-revision" class="btn btn-warning pull-right"><i class="fa fa-check-square-o"></i> Revisi</button>
                            <button type="submit" name="status" value="all-reset" class="btn btn-primary pull-right"><i class="fa fa-history"></i> Reset</button>
                            @break
                        @endif
                        @endforeach
                        <!-- End Loop -->
                    @endif
                    {{-- @endif --}}
                    <!-- End If -->
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
                            <form action="{{route('request.report.approve')}}" method="post">
                                <div class="modal-body">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <input type="hidden" name="report_id" value="{{ $report->id }}">
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



@section('css')
<!--  -->
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
