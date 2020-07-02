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

            <div class="bodyLabel">Laporan Pengajuan</div>

            <div class="subject">
                <table border='0'>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?= date('d F Y', strtotime($laporan['laporan_date_create'])) ?></td>
                        <td align='right'>Tanggal Pengajuan</td>
                        <td>:</td>
                        <td><?= date('d F Y', strtotime($pengajuan['pengajuan_date_create'])) ?></td>
                    </tr>
                    <tr>
                        <td>Perihal/Pekerjaan</td>
                        <td>:</td>
                        <td><?= $pengajuan['pengajuan_perihal'] ?></td>
                        <td align='right'>Perihal Pengajuan</td>
                        <td>:</td>
                        <td><?= $pengajuan['pengajuan_perihal'] ?></td>
                    </tr>
                    <tr>
                        <td>Dana Pengajuan yang diterima</td>
                        <td>:</td>
                        <td>Rp. <?= number_format($total_pengajuan) ?></td>
                        <td align='right'>Yang Mengajukan</td>
                        <td>:</td>
                        <td><?= $pengajuan['user_name'] ?></td>
                    </tr>

                </table>
            </div>

            <div class="content">
                <table style="border:1px solid black;border-collapse: collapse;">

                        <tr>
                            <td align="center" width="20px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">No</td>
                            <td align="center" width="230px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Jenis Pengeluaran</td>
                            <td align="center" width="30px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Qty</td>
                            <td align="center" width="50px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Satuan</td>
                            <td align="center" width="80px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Harga Satuan</td>
                            <td align="center" width="80px" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Jumlah Harga</td>
                            <td align="center" widht="" style="border:1px solid black;background:#fff;padding:5px 2px; 10px;text-transform:capitalize; font-weight:bold;">Keterangan</td>
                        </tr>

                        <?php $i = 0;
                        foreach($items as $it) : ?>

                            <tr>
                                <td style="border:1px solid black;padding:2px 5px;"><?= ++$i ?></td>
                                <td style="border:1px solid black;padding:2px 5px;"><?= $it['laporan_item'] . "/" . $it['laporan_merk'] . "/" . $it['laporan_spec'] ?></td>
                                <td align="center" style="border:1px solid black;padding:2px 5px;"><?= $it['laporan_qty'] ?></td>
                                <td style="border:1px solid black;padding:2px 5px;"><?= $it['laporan_unit'] ?></td>
                                <td align="right" style="border:1px solid black;padding:2px 5px;"><?= number_format($it['laporan_price']) ?></td>
                                <td align="right" style="border:1px solid black;padding:2px 5px;"><?= number_format($it['laporan_qty'] * $it['laporan_price']) ?></td>
                                <td align="center" style="border:1px solid black;padding:2px 5px;"><?= $it['laporan_desc'] ?></td>  
                            </tr>

                        <?php endforeach; ?>

                        <tr>
                            <td colspan='5' style="border:1px solid black;border-right:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Total Biaya</td>
                            <td colspan='2' style="border:1px solid black;border-left:0;border-bottom:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:normal;" align='right'>Rp. <?= number_format($total['total']) ?></td>
                        </tr>
                        <tr>
                            <td colspan='5' style="border:1px solid black;border-right:0;background:#fff;padding:2px 5px; 10px;text-transform:capitalize;" align='left'>Terbilang</td>
                            <td colspan='2' style="border:1px solid black;border-left:0;background:#fff;padding:2px 5px; 10px;text-transform:uppercase;font-style: italic;font-weight:bold;" align='right'><?= $terbilang ?> rupiah</td>
                        </tr>

                </table>
            </div>

        </div>

        <div class="desc">

            <table border="0" style="font-style: italic;border-collapse: collapse;">
                <tr>
                    <td width='200px'>Dana Yang Diberikan atas pengajuan</td>
                    <td width='20px'>Rp.</td>
                    <td align='right' width='100px'><?= number_format($total_pengajuan) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td width='200px'>Dana boaya yang sebenarnya</td>
                    <td width='20px' style="border-bottom: 1px solid black">Rp.</td>
                    <td align='right' style="border-bottom: 1px solid black"><?= number_format($total['total']) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td width='200px'>Sisa / Kurang</td>
                    <td width='20px'>Rp.</td>
                    <td align='right'><?= number_format($total_pengajuan -  $total['total'])?></td>
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

            <!-- Format 3 dan 4 Divisi Pemasaran -->
            <?php if($pengajuan['pengajuan_subject'] == 'Operasional Pemasaran' || $pengajuan['pengajuan_subject'] == 'Promosi Pemasaran') : ?>

                <div class="footer">

                    <?php if($user['level_capacity'] == 30) : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php else : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php else : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Harzi Fadilah Harahap</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                </tr>
                            </table>
                        <?php else : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'></th>
                                    <th width="180px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Harzi Fadilah Harahap</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                </tr>
                            </table>
                        <?php endif; ?>


                    <?php endif; ?>

                </div>


            <!-- Format 3 dan 4 Divisi Teknik / Proyek -->
            <?php elseif($pengajuan['pengajuan_subject'] == 'Pembelian Material Proyek' || $pengajuan['pengajuan_subject'] == 'Operasional Proyek' || $pengajuan['pengajuan_subject'] == 'Pembelian Tools') : ?>

                <div class="footer">

                    <?php if($user['level_capacity'] == 30) : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php else : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php else : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Fahrul Rizal</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>
                        <?php else : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'></th>
                                    <th width="180px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Fahrul Rizal</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>
                        <?php endif; ?>


                    <?php endif; ?>

                </div>

            <!-- Format 3 dan 4 Divisi Keuangan -->
            <?php elseif($pengajuan['pengajuan_subject'] == 'Operasional Kantor' || $pengajuan['pengajuan_subject'] == 'Operasional Keuangan' || $pengajuan['pengajuan_subject'] == 'Perlengkapan Kantor' || $pengajuan['pengajuan_subject'] == 'Operasional Keuangan' || $pengajuan['pengajuan_subject'] == 'Pembayaran Pajak') : ?>

                <div class="footer">

                    <?php if($user['level_capacity'] == 30) : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                        </th>
                                        <th>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php else : ?>

                            <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Harzi Fadilah Harahap</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Fahrul Rizal</th>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                                <table border='1'>      
                                    <tr>
                                        <th >Diajukan Oleh</th>
                                        <th >Diperiksa Oleh</th>
                                        <th >Disetujui Oleh</th>
                                    </tr>
                                    <tr>
                                        <th width="200px" height='100px'>
                                            <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                        </th>
                                        <th width="200px" height='100px'></th>
                                        <th></td>
                                    </tr>
                                    <tr>
                                        <th>Krisyanto Marpaung</th>
                                        <th>Fahrul Rizal</th>
                                        <th>Harzi Fadilah Harahap</th>
                                    </tr>
                                </table>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php else : ?>

                        <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>
                        <?php else : ?>
                            <table border='1'>      
                                <tr>
                                    <th>Diajukan Oleh</th>
                                    <th>Diperiksa</th>
                                    <th colspan='2'>Disetujui</th>
                                </tr>
                                <tr>
                                    <th width="180px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="180px" height='100px'></th>
                                    <th width="180px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th><?= $user['user_name'] ?></th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>
                        <?php endif; ?>


                    <?php endif; ?>

                </div>


            <!-- Format Hanya 3 TTD -->
            <?php elseif($pengajuan['pengajuan_subject'] == 'Sebelum Proyek' || $pengajuan['pengajuan_subject'] == 'Inventaris Perusahaan') : ?>

                <div class="footer">

                    <?php if($laporan['laporan_is_approve'] == 1 && $laporan['laporan_status'] == 'acc') : ?>

                        <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Harzi Fadilah Harahap</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                </tr>
                            </table>

                        <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_KRIS.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fahrul Rizal</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>

                        <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_RIZAL.png" alt="Signature">
                                    </th>
                                    <th>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/TTD_HAZRI.png" alt="Signature">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>

                        <?php endif; ?>

                    <?php else : ?>

                        <?php if($user['position_name'] == 'Manager Pemasaran') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th>Harzi Fadilah Harahap</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                </tr>
                            </table>

                        <?php elseif($user['position_name'] == 'Manager Teknik') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th>Fahrul Rizal</th>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>

                        <?php elseif($user['position_name'] == 'Manager Keuangan') : ?>

                            <table border='1'>      
                                <tr>
                                    <th >Diajukan Oleh</th>
                                    <th >Diperiksa Oleh</th>
                                    <th >Disetujui Oleh</th>
                                </tr>
                                <tr>
                                    <th width="200px" height='100px'>
                                        <img class="ttd" src="<?= base_url() ?>assets/img/users/signature/<?= $user['user_signature'] ?>" alt="Signature">
                                    </th>
                                    <th width="200px" height='100px'></th>
                                    <th></td>
                                </tr>
                                <tr>
                                    <th>Krisyanto Marpaung</th>
                                    <th>Fahrul Rizal</th>
                                    <th>Harzi Fadilah Harahap</th>
                                </tr>
                            </table>

                        <?php endif; ?>

                    <?php endif; ?>


                </div>

            <?php endif; ?>

    </div>

</body>
</html>