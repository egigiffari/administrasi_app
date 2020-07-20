<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>{{ $request->categories->name }} | Maha Appliacation</title>


    <style>
        body{
            font-family: "Times New Roman", Times, serif;
            font-size:12px;
        }
        .desc p{
            margin :0;
            padding: 0;
        }
        .desc ol{
            margin-top:5px;
            /* padding:0; */
        }
    </style>
</head>
<body>

    <div class="container" style="border: 1px solid black;">
    
        <div class="header">

            <table border='0' style="border-bottom: 1px solid black;" width=100%>
                <tr>
                    <td rowspan='2'>
                        <img class="img" src="{{public_path('image/logo2.jpg')}}" alt="logo" style="width:110px;">
                        <!-- <img class="img" src="http://progress.mahasejahtera.com/image/logo2.jpg" alt="logo" style="max-width:100px;"> -->
                    </td>
                    <td></td>
                    <td align='right' style="text-transform: uppercase;font-weight:bold; font-size:16px">PT. MAHA AKBAR SEJAHTERA</td>
                </tr>
                <tr>
                    <td></td>
                    <td align='right' style="font-size:11px">
                            Jl. STM Suka Tari N0.24 Kel SUKA MAJU<br>Medan Johor,Kota Medan 20146
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="text-transform:uppercase;font-weight:bold;padding-top:10px 0;font-size:16px;">{{ $request->categories->name }}</td>
                </tr>
            </table>

        </div>

        <div class="body">


            <div class="subject" style="padding-left: 10px;padding-top: 10px;">
                <table>
                    <tr>
                        <td width='45px'>Tanggal</td>
                        <td width="5px">:</td>
                        <td>{{ date('g F Y', strtotime($request->start_date)) }}</td>
                    </tr>
                    <tr>
                        <td width='45px'>Due Date</td>
                        <td width="5px">:</td>
                        <td>{{ date('g F Y', strtotime($request->expire_date)) }}</td>
                    </tr>
                    <tr>
                        <td width='45px'>Perihal</td>
                        <td width="5px">:</td>
                        <td>{{ $request->perihal }}</td>
                    </tr>
                    <tr>
                        <td width='45px'>No Surat</td>
                        <td width="5px">:</td>
                        <td>{{ $request->code }}</td>
                    </tr>
                    
                </table>
            </div>

            <div class="content" style="padding: 10px;">
                <table style="width:100%;border:1px solid black;border-collapse: collapse;">

                        <tr>
                            <td align="center" width="20px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">No</td>
                            <td align="center" width="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Jenis Pengeluaran/Merk/Spesifikasi</td>
                            <td align="center" width="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Qty</td>
                            <td align="center" width="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Satuan</td>
                            <td align="center" width="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Harga Satuan</td>
                            <td align="center" width="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Jumlah Harga</td>
                            <td align="center" widht="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Keterangan</td>
                        </tr>


                        <?php $i = 0 ?>
                        @foreach($items as $result => $item)
                        <tr>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ ++$i }}</td>
                            <td align="left" style="border:1px solid black;padding:2px 5px;">{{ $item->name . '/' . $item->merk . '/' . $item->spec}}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->qty }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->unit }}</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">{{number_format($item->price)}}</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">{{number_format($item->sub)}}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->desc }}</td>  
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan='2' style="border:1px solid black;border-right:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Total Biaya</td>
                            <td colspan='5' style="border:1px solid black;border-left:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:normal;" align='right'>Rp. {{number_format($request->total)}}</td>
                        </tr>
                        <tr>
                            <td colspan='2' style="border:1px solid black;border-right:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Terbilang</td>
                            <td colspan='5' style="border:1px solid black;border-left:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:bold;" align='right'>{{ $request->amount }}</td>
                        </tr>

                </table>
            </div>

        </div>

        <div class="desc" style="padding: 0 10px;font-size:12px">

            {!! $request->categories->syarat !!}

        </div>

        <div class="footer" style="padding-top: 10px;">
            <table style="width:100%;border-collapse: collapse;">      
                <tr>
                    <th style="border:1px solid black;border-bottom:0;">Diajukan Oleh</th>
                    @foreach($approvers as $approver)
                        <th style="border:1px solid black;border-bottom:0;">{{ $approver->subject }}</th>
                    @endforeach
                </tr>
                <tr>
                    <th height='100px' style="border:1px solid black;border-top:0;border-bottom:0;"><img src="{{base_path('public/' . $request->applicant->signature)}}" alt="" style="width:100px"></th>
                    @foreach($approvers as $approver)
                        @if($approver->status == 'acc')
                        <th height='100px' style="border:1px solid black;border-top:0;border-bottom:0;"><img src="{{base_path('public/' . $approver->user->signature)}}" alt="" style="width:100px"></th>
                        @else
                        <th height='100px' style="border:1px solid black;border-top:0;border-bottom:0;"></th>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th style="border:1px solid black;border-top:0;border-bottom:0;"> {{$request->applicant->name }} </th>
                    @foreach($approvers as $approver)
                        <th style="text-transform: capitalize;border:1px solid black;border-top:0;border-bottom:0;"> {{$approver->user->name}} </th>
                    @endforeach
                </tr>
                <tr>
                    <th style="border:1px solid black;border-top:0;">( Pengaju )</th>
                    @foreach($approvers as $approver)
                        <th style="text-transform: capitalize;border:1px solid black;border-top:0;">( {{$approver->position}} )</th>
                    @endforeach
                </tr>
            </table>
        </div>

    </div>

</body>
</html>