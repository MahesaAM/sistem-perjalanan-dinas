<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">kwitansi</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						<table style="width: 100%;" class="table table-bordered" id="datatable">
								<thead>
								<tr>
									<th>No</th>
									<th>Code SPPD</th>
									<th>Tanggal SPPD</th>
									<th>Anggota</th>
									<th>Jumlah (Rp)</th>
									<th style="text-align:center;">Cetak</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach($kwitansi as $k) : ?>
									<tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $k['kwitansi_code_sppd'] ?></td>
                                        <td><?= $k['kwitansi_tanggal_sppd'] ?></td>
                                        <td><?= $k['kwitansi_anggota'] ?></td>
                                        <td><?= number_format($k['kwitansi_jumlah']) ?></td>
                                        <td style="width: 15%;text-align:center;">
											<a target="_black" href="<?= base_url('Kwitansi/print_kwitansi/'.$k['kwitansi_id_sppd'].'/'.$k['kwitansi_id_anggota']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
										</td>
										<td><button data-toggle="modal" data-target="#hapus<?= $k['kwitansi_id'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></button></td>
                                    </tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<?php foreach ($kwitansi as $k) : ?>
<div class="modal fade" id="hapus<?= $k['kwitansi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Kwitansi/hapus_kwitansi') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus ?</h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $k['kwitansi_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>