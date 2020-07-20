@extends('frontend.home')
@section('title', 'Detail Penawaran')
@section('title-content', 'Detail Penawaran')
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
        <a href="{{ route('penawaran.index', $offer->id) }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        @foreach($responsibles as $responsible)
        @if($responsible->status == 'revision')
        <a href="{{ route('penawaran.revision', $offer->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Revisi </a>
        @break
        @elseif($responsible->status == 'waiting' || $responsible->status == 'perbaikan')
        <a href="{{ route('penawaran.edit', $offer->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
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
            <h2>Perihal <small>{{$offer->perihal}}</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row" style="margin-bottom:20px;">
                <div class="col-xs-12 invoice-header">
                    <h1>
                        <img src="{{ asset($offer->user->image) }}" alt="" class="img img-avatar" style="max-width:40px;"> {{$offer->user->name}}.
                    </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="margin-bottom: 20px;">
                  <b>{{ $offer->code }}</b>
                  <br>
                  <br>
                  <b>Status Pengajuan:</b>
                      @if($offer->status == 'on proses')
                      <span class="btn btn-primary btn-xs">{{$offer->status}}</span>
                      @elseif($offer->status == 'revision')
                      <span class="btn btn-warning btn-xs">{{$offer->status}}</span>
                      @elseif($offer->status == 'perbaikan')
                      <span class="btn btn-danger btn-xs">{{$offer->status}}</span>
                      @elseif($offer->status == 'hold')
                      <span class="btn btn-info btn-xs">{{$offer->status}}</span>
                      @elseif($offer->status == 'approve')
                      <span class="btn btn-success btn-xs">{{$offer->status}}</span>
                      @endif
                  <br>
                  <b>Perihal:</b> {{$offer->perihal}}
                  <br>
                  <b>Total:</b> {{'Rp ' . number_format($offer->total)}}
                  <br>
                  <b>Terbilang:</b> {{$offer->amount}}
                  <br>
                  <b>Date:</b> {{ date('g F Y', strtotime($offer->start_date))}}
                  <br>
                  <b>Expire:</b> {{ date('g F Y', strtotime($offer->due_date))}}
                  <br>
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <b>Penanggung Jawab</b>
                  <br>
                  <br>
                  @foreach($responsibles as $responsible)
                    <b>{{ $responsible->as }}:</b>
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
                @if($offer->catatan != '')
                  <div class="col-sm-4 invoice-col">
                    
                    <b>Catatan</b>
                    <br>
                    <br>
                    <span class="text-danger">{{$offer->catatan}}</span>
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
                        <th style="width:25%">Nama Pekerjaan</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach($items as $result => $item)
                      <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $item->item}}</td>
                        <td>{{ number_format($item->price) }}</td>
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
                          <td>{{ 'Rp ' . number_format($offer->total) }}</td>
                        </tr>
                        <tr>
                          <th>Terbilang</th>
                          <td>{{ $offer->amount }}</td>
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
                    <form action="{{ route('penawaran.approve') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                        <a href="{{route('penawaran.pdf', $offer->id )}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                        <!-- <a href="{{route('requestby.category.show', $offer->id)}}" target="_blank" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Pengajuan </a> -->
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
                          <form action="{{ route('penawaran.approve') }}" method="post">
                            <div class="modal-body">
                              @csrf
                              @method('patch')
                              <div class="form-group">
                                  <input type="hidden" name="offer_id" value="{{ $offer->id }}">
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