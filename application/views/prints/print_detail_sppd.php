<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<table style="width: 40%">
<?php $url = $this->uri->segment(3); ?>
                            <a target="_blank" href="<?= base_url('Sppd/print_detail_sppd/'.$url) ?>" style="float: right" class="btn btn-info"><i class="fa fa-print"></i></a>
                            <table style="width: 40%">
                                <tr>
                                    <td>Kode Surat</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_no_sppd'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Surat</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_tanggal'] ?></td>
                                </tr>
                            </table>
                            <h3 style="text-align: center; font-weight: bold;"><u>SURAT PERINTAH PERJALANAN DINAS</u></h3>
                            <h3 style="text-align: center">(SPPD)</h3>
                            <div style="margin-left: 100px; margin-right: 100px;">
                            <table style="width: 100%; font-size: 20px">
                                <tr>
                                    <td>Tanggal</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_tanggal'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Perjalanan</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_perjalanan'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jenis Perjalanan</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_jenis_perjalanan'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Nama Kegiatan</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_nama_kegiatan'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_tujuan'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Lama Perjalanan</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_lama_perjalanan'] ?> Hari</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tanggal berangkat</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_tgl_berangkat'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tanggal kembali</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_tgl_kembali'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>No Surat</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_no_surat'] ?> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>No SPPD</td>
                                    <td> : </td>
                                    <td><?= $d['sppd_no_sppd'] ?></td>
                                    <td></td>
                                </tr>
                            </table>
                            <h4>Peserta</h4>
                            <table border="1" cellspacing= "0" style="width: 100%;">
                                <tr>
                                    <td>Nip</td>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                </tr>
                                <?php $no=1; foreach($peserta as $p ) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['peserta_nama'] ?></td>
                                    <?php $id = $p['peserta_anggota_id']; $a = $this->db->query("SELECT * FROM tbl_anggota WHERE anggota_id = '$id'")->row_array(); ?>
                                    <td><?= $a['anggota_jabatan'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                            <h4>Pengikut</h4>
                            <table border="1" cellspacing= "0" style="width: 100%;">
                                <tr>
                                    <td>Nip</td>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                </tr>
                                <?php $no=1; foreach($pengikut as $p ) : ?>
                                <tr>
                                    <?php $id = $p['pengikut_anggota_id']; $a = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai_id = '$id'")->row_array(); ?>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['pegawai_nama'] ?></td>
                                    <td><?= $a['pegawai_jabatan'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                            <h4>Biaya</h4>
                            <table border="1" cellspacing= "0" style="width: 100%;">
                                <tr>
                                    <td>Keterangan</td>
                                    <td>Total</td>
                                </tr>
                                <?php foreach($biaya as $b ) : ?>
                                <tr>
                                    <td><?= $b['biaya_ket'] ?></td>
                                    <td><?= $b['biaya_val'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                            <br>
                            <hr>
                            <!-- <h4>Laporan</h4>
                            <table style="width: 50%;">
                                <tr>
                                    <td>hsdkj</td>
                                    <td>ahskdh</td>
                                </tr>
                            </table> -->
                            </div>
</body>
</html>

<script>
    window.print();
</script>