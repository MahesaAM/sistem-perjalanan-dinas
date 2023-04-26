<html lang="en">
<head>
    <title>Print Pegawai</title>
</head>
<body>
<table border="1" cellspacing="0" style="width: 100%;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Golongan</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($pegawai as $p ): ?>
                                    <tr>
                                        <td><?= $p['pegawai_nip'] ?></td>
                                        <td><?= $p['pegawai_nama'] ?></td>
                                        <td><?= $p['pegawai_alamat'] ?></td>
                                        <td><?= $p['pegawai_nohp'] ?></td>
                                        <td><?= $p['pegawai_golongan'] ?></td>
                                        <td><?= $p['pegawai_jabatan'] ?></td>
									<?php endforeach ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->
</body>
</html>

<script>
    window.print();
</script>