<div class="row">
	<div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Sppd') ?>"> Kembali</a>
        <h1 class="page-header">SPD </h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <table style="width: 100%;" class="table table-bordered">
								<thead>
								<tr>
									<th style="width: 10%;">No</th>
									<th>Nama</th>
									<th style="width: 15%;text-align:center;">Rincian</th>
								</tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($nominatif as $n ): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $n['nominatif_nama'] ?></td>
									<td style="text-align:center;">
										<a href="<?= base_url('Sppd/rincian/'.$n['nominatif_id_anggota'].'/'.$this->uri->segment(3)) ?>" title="Buat Rincian" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="<?= base_url('Sppd/detail_nominatif/'.$n['nominatif_id_anggota'].'/'.$this->uri->segment(3)) ?>" title="Detail" class="btn btn-danger btn-sm"><i class="fa fa-book"></i></a>
										<button data-toggle="modal" data-target="#buat_kwitansi<?= $n['nominatif_id'] ?>" title="Buat Kwitansi" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i></button>
									</td>
								</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

<?php foreach($nominatif as $n ) : ?>
<div class="modal fade" id="buat_kwitansi<?= $n['nominatif_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Kwitansi/buat_kwitansi') ?>" method="post">
		<h3>Pastikan data sudah benar..!!</h3>
		<input type="hidden" value="<?= $n['nominatif_id_anggota'] ?>" name="id_anggota">
		<input type="hidden" value="<?= $n['nominatif_id_sppd'] ?>" name="id_sppd">
		<input type="hidden" value="<?= $n['nominatif_kode_sppd'] ?>" name="kode_sppd">
		<input type="hidden" value="<?= $n['nominatif_nama'] ?>" name="nama">
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
		<button type="submit" class="btn btn-primary">Benar</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>