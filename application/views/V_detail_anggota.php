<div class="row">
	<div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Data_anggota') ?>"> Kembali</a>
        <h1 class="page-header">Detail Anggota</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <table style="width: 70%;">
                                <tr>
                                    <td>2.</td>
                                    <td>Nama</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Alamat</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>No HP</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_no_hp'] ?></td>
                                </tr>
                                <tr>
                                <td>5.</td>
                                    <td>Jabatan</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_jabatan'] ?></td>
                                </tr>
                                <tr>
                                <td>6.</td>
                                    <td>Partai</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_partai'] ?></td>
                                </tr>
                                <tr>
                                <td>7.</td>
                                    <td>Komisi</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_komisi'] ?></td>
                                </tr>
                                <tr>
                                <td>8.</td>
                                    <td>Jabatan Komisi</td>
                                    <td> : </td>
                                    <td><?= $d['anggota_jabatan_komisi'] ?></td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Badan</td>
                                    <td> : </td>
                                    <td><button data-toggle="modal" data-target="#tambah_badan" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></button></td>
                                </tr>
                                <?php $n=1; foreach($masuk_b as $mb) : ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $n++.' '. $mb['badan_nama'].' - '.$mb['badan_jabatan'] ?> <a onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('Data_anggota/hapus_badan/'.$mb['badan_anggota_id'].'/'.$mb['badan_id']) ?>"><i style="color:red;" class="fa fa-times"></i></a></td>
                                </tr>
                                <?php endforeach ?>
                            </table>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->

<div class="modal fade" id="tambah_badan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Data_anggota/tambah_badan') ?>" method="post">
        <input type="hidden" value="<?= $d['anggota_id'] ?>" name="id">
        <div class="form-groub">
            <label>Badan</label>
        <select name="badan" class="form-control" required="">
            <option value="">-pilih Badan-</option>
            <?php foreach($badan as $b) : ?>
                <?php $id = $this->uri->segment(3); $b_nama = $b['badan_nama'];
                $chk = $this->db->query("SELECT * FROM tbl_anggota_badan WHERE badan_anggota_id = '$id' AND badan_nama = '$b_nama' ");
                if ($chk->num_rows()<1) : ?>
                <option value="<?= $b['badan_nama'] ?>"><?= $b['badan_nama'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        </div>
        <div class="form-groub">
            <label>Jabatan</label>
        <select name="jabatan" class="form-control" required="">
        <option value="">-pilih Jabatan-</option>
            <?php foreach($jabatan as $j) : ?>
                <option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
            <?php endforeach ?>
        </select>
        </div>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<button type="submit" class="btn btn-primary">OK</button>
		</form>
      </div>
    </div>
  </div>
</div>