<?php           

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_categories')->insert([
            
            // Divisi Teknik
            [
                'name' => 'Pengajuan Operasional Proyek',
                'code' => '/OP/TC/',
                'type' => 2,
                'division_id' => 3,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Operasional&nbsp;Proyek&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Operasional Meliputi :</i>
                                        <ul><li><i>Makan dan Minum</i></li>
                                            <li><i>Penginapan / Biaya Sewa</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya entertain lapangan</i></li>
                                            <li><i>Biaya OKP (Ormas, SPSI, Preman)</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama di lapangan</i></li>
                                        </ul></li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Operasional Teknik',
                'code' => '/OP/TC/',
                'type' => 2,
                'division_id' => 3,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Operasional&nbsp;Teknik&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Operasional Meliputi :</i>
                                        <ul><li><i>Makan dan Minum</i></li>
                                            <li><i>Penginapan / Biaya Sewa</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya entertain lapangan</i></li>
                                            <li><i>Biaya OKP (Ormas, SPSI, Preman)</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama di lapangan</i></li>
                                        </ul></li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Teknik untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Pengalokasian dana Operasional Teknik ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Pembelian Material Proyek',
                'code' => '/PB/TC/',
                'type' => 1,
                'division_id' => 3,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Pembelian&nbsp;Material&nbsp;Proyek&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengajuan Pembelian Material Proyek Meliputi :</i>
                                    <ul>
                                        <li><i>Seluruh material proyek</i></li>
                                        <li><i>Sewa-menyewa kendaraan/alat berat/peralatan dll</i></li>
                                        <li><i>Jasa Keamanan</i></li>
                                        <li><i>Ekspedisi/pengangkutan/mobilisasi</i></li>
                                    </ul>
                                </li>
                                <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Pembelian Material Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],
            [
                'name' => 'Pengajuan Perlengkapan/Peralatan Inventaris Proyek',
                'code' => '/INV/TC/MAHA/',
                'type' => 1,
                'division_id' => 3,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Perlengkapan/Peralatan&nbsp;Inventaris&nbsp;Proyek&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengajuan Perlengkapan/Peralatan Inventaris Proyek Meliputi :</i>
                                    <ul>
                                        <li><i>Perlengkapan (Tas, Jas Hujan, dll)</i></li>
                                        <li><i>APD (Alat Pengaman Diri)</i></li>
                                        <li><i>Suku Cadang</i></li>
                                        <li><i>Alat Tulis Kerja</i></li>
                                        <li><i>Aksesoris Kerja</i></li>
                                    </ul>
                                </li>
                                <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Pembelian Perlengkapan/Peralatan Inventaris Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],
            [
                'name' => 'Rencana Anggaran Bulanan Teknik',
                'code' => '/RAB/TC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Rencana&nbsp;Anggaran&nbsp;Bulanan&nbsp;Teknik&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],



            // Divisi Pemasaran
            [
                'name' => 'Pengajuan Operasional Pemasaran',
                'code' => '/OP/MK/',
                'type' => 2,
                'division_id' => 2,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Operasional&nbsp;Pemasaran&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh kepala divisi Pemasaran dan Mrg. Keuangan serta disetujui oleh Finance Audit selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Operasional Meliputi :</i>
                                        <ul><li><i>Makan dan Minum</i></li>
                                            <li><i>Penginapan / Biaya Sewa</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama pengajuan</i></li>
                                        </ul></li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Pemasaran untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Promosi Pemasaran',
                'code' => '/PPS/MK/',
                'type' => 2,
                'division_id' => 2,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Promosi&nbsp;Pemasaran&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh kepala divisi Pemasaran dan Mrg. Keuangan serta disetujui oleh Finance Audit selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Promosi Meliputi :</i>
                                        <ul>
                                            <li><i>Prormosi Penjualan</i></li>
                                            <li><i>Entertain</i></li>
                                            <li><i>Share Profit</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama tahap promosi</i></li>
                                        </ul>
                                    </li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Promosi Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Sebelum Proyek',
                'code' => '/PSP/MK/',
                'type' => 2,
                'division_id' => 2,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Sebelum&nbsp;Proyek&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh kepala divisi Pemasaran dan Mrg. Keuangan serta disetujui oleh Finance Audit selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Sebelum Proyek Meliputi :</i>
                                        <ul>
                                            <li><i>Biaya survey</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya entertain customer</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama tahap sebelum jatuh kontrak</i></li>
                                        </ul>
                                    </li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Sebelum Project untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Rencana Anggaran Bulanan Pemasaran',
                'code' => '/RAB/TC/',
                'type' => 2,
                'division_id' => 2,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Rencana&nbsp;Anggaran&nbsp;Bulanan&nbsp;Pemasaran&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Pemasaran dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],

            // Divisi Keuangan
            [
                'name' => 'Pengajuan Operasional Kantor',
                'code' => '/OP/FC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Operasional&nbsp;Kantor&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh Mrg. Keuangan serta disetujui oleh Direktur Audit selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Operasional Meliputi :</i>
                                        <ul><li><i>Makan dan Minum</i></li>
                                            <li><i>Penginapan / Biaya Sewa</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama di lapangan</i></li>
                                        </ul></li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Kantor untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Pengalokasian dana Operasional Kantor ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Operasional Keuangan',
                'code' => '/OP/FC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Operasional&nbsp;Keuangan&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                                <ol>
                                    <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                    <li><i>Pengajuan harus diperiksa oleh Mrg. Keuangan serta disetujui oleh Direktur Audit selambat-lambatnya 2 hari</i></li>
                                    <li><i>Pengajuan Operasional Meliputi :</i>
                                        <ul><li><i>Makan dan Minum</i></li>
                                            <li><i>Penginapan / Biaya Sewa</i></li>
                                            <li><i>Kendaraan dan biaya operasional kendaraan</i></li>
                                            <li><i>Biaya lainnya yang dipandang harus keluar selama di lapangan</i></li>
                                        </ul></li>
                                    <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Operasional Keuangan untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                    <li><i>Pengalokasian dana Operasional Keuangan ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                    <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                                </ol>'
            ],
            [
                'name' => 'Pengajuan Pembelian Perlengkapan Kantor',
                'code' => '/PPP/FC/',
                'type' => 1,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Pembelian&nbsp;Perlengkapan&nbsp;Kantor&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Teknik dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengajuan Pembelian Perlengkapan Kantor Meliputi :</i>
                                    <ul>
                                        <li><i>Perlengkapan pecah belah</i></li>
                                        <li><i>Perlengkapan alat kebersihan kantor</i></li>
                                        <li><i>Perlengkapan alat/aksesoris olahraga kantor</i></li>
                                        <li><i>Perlengkapan alat/aksesoris hiburan kantor</i></li>
                                        <li><i>Perlengkapan keindahan kantor</i></li>
                                        <li><i>Perlengkapan Dapur</i></li>
                                        <li><i>Perlengkapan P3K</i></li>
                                    </ul>
                                </li>
                                <li><i>Setelah Pengajuan disetujui dan dana sudah diterima, wajib membuat Laporan Pertanggung Jawaban Rincian Biaya Pembelian Perlengkapan Kantor untuk dilakukan kepada divisi Keuangan beserta bukti transaksi selambat-lambatnya 1 hari setelah transaksi selesai.</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],
            [
                'name' => 'Rencana Anggaran Bulanan Kantor',
                'code' => '/RAB/FC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Rencana&nbsp;Anggaran&nbsp;Bulanan&nbsp;Kantor&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Kantor dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],
            [
                'name' => 'Rencana Anggaran Bulanan Keuangan',
                'code' => '/RAB/FC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat&nbsp;dan&nbsp;Ketentuan&nbsp;Pengajuan&nbsp;Rencana&nbsp;Anggaran&nbsp;Bulanan&nbsp;Keuangan&nbsp;antara&nbsp;lain&nbsp;:</i></p>
                            <ol>
                                <li><i>Batas Pengajuan di eksekusi/proses paling lambat 7 (tujuh) hari</i></li>
                                <li><i>Pengajuan harus diperiksa oleh kepala divisi Keuangan dan Mrg. Keuangan serta disetujui oleh Direktur selambat-lambatnya 2 hari</i></li>
                                <li><i>Pengalokasian dana Operasional Proyek ke pembelian lainnya harus di laporkan sesegera mungkin kepada Mgr</i></li>
                                <li><i>Due Date Pengajuan selama 7 (Tujuh) Hari, Jika melebihi batas waktu harus mengajukan pengajuan baru/revisi</i></li>
                            </ol>'
            ],
            [
                'name' => 'Pengajuan Pembayaran Pajak',
                'code' => '/PPP/FC/',
                'type' => 2,
                'division_id' => 4,
                'syarat' => '<p><i>Syarat dan Ketentuan Pengajuan Pembelian Material Proyek antara lain &nbsp;:</i></p>
                            <ol>
                                <li><i>Pengajuan harus ditanda tangani oleh &nbsp;Kepala divisi Keuangan dan Financial Audit, Kemudian oleh Direktur</i></li>
                                <li><i>Pengajuan Pajak meliputi :</i>
                                    <ul>
                                        <li><i>Pembayaran Pajak PPh</i></li>
                                        <li><i>Pembayaran Pajak PPn</i></li>
                                        <li><i>Pembayaran Pajak Lainnya</i></li>
                                    </ul>
                                </li>
                                <li><i>Pengajuan Pembayaran Pajak disusun untuk Pembayaran Pajak Masa (Bulanan) maupun Pembayaran Pajak Tahunan</i></li>
                                <li><i>Besaran nilai pengajuan harus mempertimbangkan Histori Pengajuan Biaya pada bulan - bulan sebelumnya.</i></li>
                            </ol>'
            ],

        ]);
    }
}
