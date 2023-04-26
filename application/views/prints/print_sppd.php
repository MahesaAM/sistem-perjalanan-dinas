<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Data Jadwal</h2>
    <table style="width:100%" border="1" cellspacing="0">
    <thead>
                                    <tr>
                                        <th>No SPPD</th>
                                        <th>Tanggal</th>
                                        <th>Perjalanan</th>
                                        <th>Jenis Perjalanan</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tujuan</th>
                                        <th>Berangkat</th>
                                        <th>Kembali</th>
                                        <th>User Input</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php  foreach ($sppd as $s) : ?>
									<tr>
                                        <td><?= $s['sppd_no_sppd'] ?></td>
                                        <td><?= $s['sppd_tanggal'] ?></td>
										<td><?= $s['sppd_perjalanan'] ?></td>
										<td><?= $s['sppd_jenis_perjalanan'] ?></td>
										<td><?= $s['sppd_nama_kegiatan'] ?></td>
                                        <td><?= $s['sppd_tujuan'] ?></td>
                                        <td><?= $s['sppd_tgl_berangkat'] ?></td>
                                        <td><?= $s['sppd_tgl_kembali'] ?></td>
                                        <td><?= $s['sppd_username_input'] ?></td>
									</tr>	
									<?php endforeach; ?>
                                </tbody>
                            </table>
    </body>
</html>

<script>
    window.print();
</script>