<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>{{ $report->categories->name }} | Maha Appliacation</title>


    <style>
        body{
            font-family: "Times New Roman", Times, serif;
            font-size:12px;
        }
    </style>
</head>
<body>

    <div class="container" style="border: 1px solid black;">
    
        <div class="header">

            <table border='0' style="border-bottom: 1px solid black;" width=100%>
                <tr>
                    <td rowspan='2'>
                        <img class="img" src="{{base_path('public\image\logo.png')}}" alt="logo" style="width:100px;">
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
                    <td colspan="3" align="center" style="text-transform:uppercase;font-weight:bold;padding-top:10px 0;font-size:16px;">Laporan Pengajuan</td>
                </tr>
            </table>

        </div>

        <div class="body">

            <div class="subject" style="padding-left: 10px;padding-top: 10px;">
                <table border='0'>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td style="width:300px;"><?= date('d F Y', strtotime($report->created_at)) ?></td>
                        <td>Tanggal Pengajuan</td>
                        <td>:</td>
                        <td><?= date('d F Y', strtotime($report->request->start_date)) ?></td>
                    </tr>
                    <tr>
                        <td>Perihal/Pekerjaan</td>
                        <td>:</td>
                        <td><?= $report->perihal ?></td>
                        <td>Perihal Pengajuan</td>
                        <td>:</td>
                        <td><?= $report->request->perihal ?></td>
                    </tr>
                    <tr>
                        <td>Dana Pengajuan yang diterima</td>
                        <td>:</td>
                        <td>Rp. <?= number_format($report->total) ?></td>
                        <td>Yang Mengajukan</td>
                        <td>:</td>
                        <td><?= $report->applicant->name ?></td>
                    </tr>

                </table>
            </div>

            <div class="content" style="padding: 10px;">
                <table style="width:100%;border:1px solid black;border-collapse: collapse;">

                        <tr>
                            <td rowspan='2' align="center" width="20px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">No</td>
                            <td rowspan='2' align="center" width="93.3px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Nama Barang</td>
                            <td colspan='2' align="center" width="186.6px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Deskripsi</td>
                            <td rowspan='2' align="center" width="30px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Qty</td>
                            <td rowspan='2' align="center" width="80px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Satuan</td>
                            <td rowspan='2' align="center" width="80px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Harga Satuan</td>
                            <td rowspan='2' align="center" width="80px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Jumlah Harga</td>
                            <td rowspan='2' align="center" widht="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Keterangan</td>
                        </tr>

                        <tr>
                            <td align="center" width="93.3px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Merk</td>
                            <td align="center" width="93.3px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Spesifikasi</td>
                        </tr>

                        <?php $i = 0 ?>
                        @foreach($items as $result => $item)
                        <tr>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ ++$i }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->merk }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->name }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->spec }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->qty }}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->unit }}</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">{{number_format($item->price)}}</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">{{number_format($item->sub)}}</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">{{ $item->desc }}</td>  
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan='2' style="border:1px solid black;border-right:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Total Biaya</td>
                            <td colspan='7' style="border:1px solid black;border-left:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:normal;" align='right'>Rp. {{number_format($report->total)}}</td>
                        </tr>
                        <tr>
                            <td colspan='2' style="border:1px solid black;border-right:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Terbilang</td>
                            <td colspan='7' style="border:1px solid black;border-left:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:bold;" align='right'>{{ $report->amount }}</td>
                        </tr>

                </table>
            </div>

        </div>

        <div class="desc">

            <table border="0" style="font-style: italic;border-collapse: collapse;">
                <tr>
                    <td width='200px'>Dana Yang Diberikan atas pengajuan</td>
                    <td width='20px'>Rp.</td>
                    <td align='right' width='100px'><?= number_format($report->request->total) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td width='200px'>Dana boaya yang sebenarnya</td>
                    <td width='20px' style="border-bottom: 1px solid black">Rp.</td>
                    <td align='right' style="border-bottom: 1px solid black"><?= number_format($report->total) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td width='200px'>Sisa / Kurang</td>
                    <td width='20px'>Rp.</td>
                    <td align='right'><?= number_format($report->request->total -  $report->total)?></td>
                    <td></td>
                </tr>
            </table>

        </div>

        <div class="desc">

            <table border="0" style="font-style: italic;border-collapse: collapse;">
                <tr>
                    <td width='20px'>1</td>
                    <td>Jika dana berlebih, dikembalikan kepada kasir / masuk ke Kas Kecil</td>
                </tr>
                <tr>
                    <td width='20px'>2</td>
                    <td>Jika dana kurang di Reimbursment dengan mengajukan pergantian biaya</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Demikian Laporan Pengajuan ini di perbuat untuk dapat dimaklumi dan diketahui sesuai dengan fungsinya</td>
                </tr>
                <tr>
                    <td>NB:</td>
                    <td> Seluruh Transaksi harus disertai dengan Bukti Transaksi (Kwitansi), Kalau tidak disertai dengan bukti transaksi harus diklarifikasi dengan Voucher</td>
                </tr>
            </table>

        </div>

        <div class="footer" style="padding-top: 10px;">
            <table border='1' style="width:100%">      
                <tr>
                    <th>Diajukan Oleh</th>
                    @foreach($approvers as $approver)
                        <th>{{ $approver->subject }}</th>
                    @endforeach
                </tr>
                <tr>
                    <th height='100px'><img src="{{base_path('public/' . $report->applicant->signature)}}" alt="" style="width:100px"></th>
                    @foreach($approvers as $approver)
                        @if($approver->status == 'acc')
                        <th height='100px'><img src="{{base_path('public/' . $approver->user->signature)}}" alt="" style="width:100px"></th>
                        @else
                        <th height='100px'></th>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th>{{$report->applicant->name}}</th>
                    @foreach($approvers as $approver)
                        <th style="text-transform: capitalize;"> {{$approver->position}} </th>
                    @endforeach
                </tr>
            </table>
        </div>

    </div>

</body>
</html>