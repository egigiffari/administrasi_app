<?php
    function integerToRoman($integer)
    {
     // Convert the integer into an integer (just to make sure)
     $integer = intval($integer);
     $result = '';
     
     // Create a lookup array that contains all of the Roman numerals.
     $lookup = array('M' => 1000,
     'CM' => 900,
     'D' => 500,
     'CD' => 400,
     'C' => 100,
     'XC' => 90,
     'L' => 50,
     'XL' => 40,
     'X' => 10,
     'IX' => 9,
     'V' => 5,
     'IV' => 4,
     'I' => 1);
     
     foreach($lookup as $roman => $value){
      // Determine the number of matches
      $matches = intval($integer/$value);
     
      // Add the same number of characters to the string
      $result .= str_repeat($roman,$matches);
     
      // Set the integer to be the remainder of the integer and the value
      $integer = $integer % $value;
     }
     
     // The Roman numeral should be built, return it
     return $result;
    }

    function getNumber($num)
    {
        $result = [];
        for ($i=1; $i <= $num; $i++) { 
            array_push($result, integerToRoman($i));
        }

        $result = implode('+', $result);

        return $result;
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url()?>assets/css/pdf.css">

    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico">
    <title><?= $for;?> | Maha Appliacation</title>
</head>
<body>

    <div class="container">
    
        <div class="header">

            <table border='0'>
                <tr>
                    <td rowspan='2'>
                        <img class="img" src="<?= base_url('assets/img/logo.png') ?>" alt="logo">
                    </td>
                    <td width='320px'></td>
                    <td align='right'><h3>PT. MAHA AKBAR SEJAHTERA</h3></td>
                </tr>
                <tr>
                    <td  width='320px'></td>
                    <td align='right'>
                            Jl. STM Suka Tari N0.24 Kel Sukamaju Medan Johor,Kota Medan 20146
                    </td>
                </tr>
            </table>

        </div>

        <div class="body">

            <div class="bodyLabel">pengajuan pembelian material / jasa proyek</div>

            <div class="subject">
                <table>
                    <tr>
                        <td width='60px'>Tanggal</td>
                        <td width="15px">:</td>
                        <td>02 Maret 2020</td>
                    </tr>
                    <tr>
                        <td width='60px'>Perihal</td>
                        <td width="15px">:</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td width='60px'>No Surat</td>
                        <td width="15px">:</td>
                        <td>001/OP/TC/IV/2020</td>
                    </tr>
                    <tr>
                        <td width='60px'>Due Date</td>
                        <td width="15px">:</td>
                        <td>09 Maret 2020</td>
                    </tr>
                </table>
            </div>

            <div class="content">
                <table style="border:1px solid black;border-collapse: collapse;">

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

                        <tr>
                            <td style="border:1px solid black;padding:2px 5px;">1</td>
                            <td style="border:1px solid black;padding:2px 5px;">BBM</td>
                            <td style="border:1px solid black;padding:2px 5px;">Pertalite</td>
                            <td style="border:1px solid black;padding:2px 5px;">Bensin</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">1</td>
                            <td style="border:1px solid black;padding:2px 5px;">Liter</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">Rp. 6,500</td>
                            <td align="right" style="border:1px solid black;padding:2px 5px;">Rp. 6,500</td>
                            <td align="center" style="border:1px solid black;padding:2px 5px;">Desc</td>  
                        </tr>

                        <tr>
                            <td colspan='6' style="border:1px solid black;border-right:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Total Biaya</td>
                            <td colspan='3' style="border:1px solid black;border-left:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:normal;" align='right'>Rp. 0</td>
                        </tr>
                        <tr>
                            <td colspan='6' style="border:1px solid black;border-right:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Terbilang</td>
                            <td colspan='3' style="border:1px solid black;border-left:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:bold;" align='right'>Rupiah</td>
                        </tr>

                </table>
            </div>

        </div>

        <div class="desc">

            <table border="0" style="font-style: italic;">
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

        <div class="footer">
            <table border='1'>      
                <tr>
                    <th>Diajukan Oleh</th>
                    <th colspan='2'>Diperiksa</th>
                    <th>Disetujui</th>
                </tr>
                <tr>
                    <th width="180px" height='100px'></th>
                    <th width="180px" height='100px'></th>
                    <th width="180px" height='100px'></th>
                    <th></td>
                </tr>
                <tr>
                    <th>Pengaju</th>
                    <th>Fahrul Rizal</th>
                    <th>Krisyanto Marpaung</th>
                    <th>Harzi Fadilah Harahap</th>
                </tr>
            </table>
            <!-- <table border='1'>      
                <tr>
                    <th colspan='2'>Diperiksa</th>
                    <th>Disetujui</th>
                </tr>
                <tr>
                    <th width="200px" height='100px'></th>
                    <th width="200px" height='100px'></th>
                    <th></td>
                </tr>
                <tr>
                    <th>Fahrul Rizal</th>
                    <th>Krisyanto Marpaung</th>
                    <th>Harzi Fadilah Harahap</th>
                </tr>
            </table> -->
        </div>

    </div>

</body>
</html>