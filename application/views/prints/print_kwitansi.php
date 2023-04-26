<html lang="en">
<head>
    <title>Print Kwitansi</title>
</head>
<body>
    <p>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</p>
    <table>
        <tr>
            <td>BENDAHARA</td>
            <td> : </td>
            <td>DIRJEN BINA MARGA</td>
        </tr>
        <tr>
            <td>NOMINKU</td>
            <td> : </td>
            <td></td>
        </tr>
    </table>
    <center>
        <p><u><b>KWITANSI</b></u></p>
    </center>
    <hr>
    <table>
        <tr>
            <td>Terima Dari</td>
            <td> : </td>
            <td><?= $k['text_header_kanan'] ?></td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>Uang Sejumlah</td>
            <td> : </td>
            <td>Rp. <?= number_format($r['jumlah']) ?></td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>Untuk Keperluan</td>
            <td>  </td>
            <td>Biaya Perjalanan Dinas Dalam Rangka :</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?= $s['sppd_nama_kegiatan'] ?></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Sesuai</td>
            <td> : </td>
            <td><?= $s['sppd_no_sppd'] ?></td>
        </tr>
    </table>
    <hr>
    <table style="width: 100%; height: 50%;">
        <tr>
            <td style="width: 40%;"></td>
            <td style="width: 20%;"></td>
            <td style="width: 40%; text-align:center">
            <?= $k['kota'] ?>, <?= date('d M Y') ?><br>
            Yang Menerima <br>
            <div style="height:40%;width:20%"></div><br>
            <u style="text-transform:uppercase"><?= $a['nominatif_nama'] ?></u><br>
            </td>
        </tr>
        <tr>
        <td style="width: 40%; text-align:center">
            Setuju Dibayar<br>
            <?= $k['text_header_kiri'] ?><br>
            <div style="height:40%;width:20%"></div><br>
            <u style="text-transform:uppercase"><?= $ki['pegawai_nama'] ?></u><br>
            <?= $k['pegawai_kiri'] ?>
            </td>
            <td style="width: 20%;"></td>
            <td style="width: 40%; text-align:center">
            <?= $k['text_header_kanan'] ?><br>
            <div style="height:40%;width:20%"></div><br>
            <u style="text-transform:uppercase"><?= $ka['pegawai_nama'] ?></u><br>
            <?= $k['pegawai_kanan'] ?>
            </td>
        </tr>
    </table>
</body>
</html>

<script>
    window.print();
</script>