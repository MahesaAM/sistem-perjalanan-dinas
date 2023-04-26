<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Data Anggota</h2>
    <table style="width:100%" border="1" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
										<th>Alamat</th>
										<th>Jabatan</th>
										<th>Komisi</th>
										<th>Jabatan Komisi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($anggota as $a) : ?>
									<tr>
										<td><?= $a['anggota_nama'] ?></td>
										<td><?= $a['anggota_alamat'] ?></td>
										<td><?= $a['anggota_jabatan'] ?></td>
										<td><?= $a['anggota_komisi'] ?></td>
										<td><?= $a['anggota_jabatan_komisi'] ?></td>
									</tr>	
									<?php endforeach; ?>
                                </tbody>
                            </table>
    </body>
</html>

<script>
    window.print();
</script>