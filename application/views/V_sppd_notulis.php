<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Daftar SPPD</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
          <a target="_blank" class="btn btn-warning" href="<?= base_url('Sppd/print_sppd') ?>"><i class="fa fa-print"></i> Print</a>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width:100%" class="table table-bordered table-hover table-striped display nowrap" id="dataTable">
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
                                        <th>Detail</th>
                                        <th style="text-align: center">Action</th>
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
                    <td>
                    <a href="<?= base_url('Sppd_notulis/detail/'.$s['sppd_id']) ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    </td>
										<td style="width: 150px; text-align:center;">
                      <?php
                        $id = $s['sppd_id'];
                        $b = $this->db->query("SELECT * FROM tbl_sppd_biaya WHERE biaya_sppd_id = '$id' ");
                        $l = $this->db->query("SELECT * FROM tbl_sppd_laporan WHERE laporan_sppd_id = '$id' ");
                        $d = $this->db->query("SELECT * FROM tbl_sppd_documentasi WHERE documentasi_sppd_id = '$id' ");
                        if($b->num_rows()>0 || $l->num_rows()>0 || $d->num_rows()>0 ) : ?>
                          <a href="<?= base_url('Sppd_notulis/v_edit_lampiran/'.$s['sppd_id']) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                          <?php else: ?>
                          <a href="<?= base_url('Sppd_notulis/v_tambah_lampiran/'.$s['sppd_id']) ?>" class="btn btn-primary"><i class="fa fa-book"></i></a>
                        <?php endif ?>
										</td>
									</tr>	
									<?php endforeach; ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->

<?php foreach($sppd as $s ) : ?>
<div class="modal fade" id="hapus_sppd<?= $s['sppd_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Sppd/hapus_sppd') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus ?</h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $s['sppd_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>