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
                    <td colspan="3" align="center" style="text-transform:uppercase;font-weight:bold;padding-top:10px 0;font-size:16px;">{{ $request->categories->name }}</td>
                </tr>
            </table>

        </div>

        <div class="body">


            <div class="subject" style="padding-left: 10px;padding-top: 10px;">
                <table>
                    <tr>
                        <td width='60px'>Tanggal</td>
                        <td width="15px">:</td>
                        <td>{{ date('g F Y', strtotime($request->start_date)) }}</td>
                    </tr>
                    <tr>
                        <td width='60px'>Perihal</td>
                        <td width="15px">:</td>
                        <td>{{ $request->perihal }}</td>
                    </tr>
                    <tr>
                        <td width='60px'>No Surat</td>
                        <td width="15px">:</td>
                        <td>{{ $request->code }}</td>
                    </tr>
                    <tr>
                        <td width='60px'>Due Date</td>
                        <td width="15px">:</td>
                        <td>{{ date('g F Y', strtotime($request->expire_date)) }}</td>
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
                            <td colspan='6' style="border:1px solid black;border-right:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Total Biaya</td>
                            <td colspan='3' style="border:1px solid black;border-left:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:normal;" align='right'>Rp. {{number_format($request->total)}}</td>
                        </tr>
                        <tr>
                            <td colspan='6' style="border:1px solid black;border-right:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Terbilang</td>
                            <td colspan='3' style="border:1px solid black;border-left:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:bold;" align='right'>{{ $request->amount }}</td>
                        </tr>

                </table>
            </div>

        </div>

        <div class="desc" style="padding: 0 10px;">

            <table border="0" style="font-style: italic;font-size:12px">
                <tr>
                    <td colspan="3">Syarat dan Ketentuan Pengajuan Operasional Proyek antara lain :</td>
                </tr>

                <tr>
                    <td style="width:20px">1</td>
                    <td colspan="2">Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</td>
                </tr>
                <tr>
                    <td style="width:20px">2</td>
                    <td colspan="2">Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</td>
                </tr>

                <tr>
                    <td style="width:20px">3</td>
                    <td colspan="2">Pengajuan Opersional Meliputi :</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">A.</td>
                    <td>Makan dan Minum</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">B.</td>
                    <td>Penginapan / Biaya Sewa</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">C.</td>
                    <td>Kendaraan dan biaya operasional kendaraan</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">D.</td>
                    <td>Biaya entertain lapangan</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">E.</td>
                    <td>Biaya OKP (Ormas, SPSI, Preman)</td>
                </tr>

                <tr>
                    <td style="width:20px"></td>
                    <td style="width:20px">F.</td>
                    <td>Biaya lainnya yang dipandang harus keluar selama di lapangan</td>
                </tr>

                <tr>
                    <td style="width:20px">4</td>
                    <td colspan="2">Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</td>
                </tr>

                <tr>
                    <td style="width:20px">5</td>
                    <td colspan="2">Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</td>
                </tr>

                <tr>
                    <td style="width:20px">6</td>
                    <td colspan="2">Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</td>
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
                    <th height='100px'><img src="{{base_path('public/' . $request->applicant->signature)}}" alt="" style="width:100px"></th>
                    @foreach($approvers as $approver)
                        @if($approver->status == 'acc')
                        <th height='100px'><img src="{{base_path('public/' . $approver->user->signature)}}" alt="" style="width:100px"></th>
                        @else
                        <th height='100px'></th>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th>Pengaju</th>
                    @foreach($approvers as $approver)
                        <th style="text-transform: capitalize;"> {{$approver->position}} </th>
                    @endforeach
                </tr>
            </table>
        </div>

    </div>

</body>
</html>