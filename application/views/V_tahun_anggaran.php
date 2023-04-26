<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tahun Anggaran</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_tahun"><i class="fa fa-plus"></i> Tambah anggaran</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						<table style="width: 100%;" class="table table-bordered" id="datatable">
								<thead>
								<tr>
									<th>No</th>
									<th>Tahun</th>
									<th>Pagu Luar Negri</th>
									<th>Pagu Dalam Negri</th>
									<th>Pagu Dalam Kota</th>
									<th style="width: 15%;text-align:center;">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach($anggaran as $a) : ?>
									<tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $a['anggaran_tahun'] ?></td>
                                        <td><?= $a['anggaran_luar_negri'] ?></td>
                                        <td><?= $a['anggaran_dalam_negri'] ?></td>
                                        <td><?= $a['anggaran_dalam_kota'] ?></td>
                                        <td style="width: 15%;text-align:center;">
											<button data-toggle="modal" data-target="#edit_tahun<?= $a['anggaran_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button data-toggle="modal" data-target="#hapus_tahun<?= $a['anggaran_id'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></button>
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


<!-- Modal tambah tahun -->
<div class="modal fade" id="tambah_tahun" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Tahun_anggaran/tambah_tahun_anggaran') ?>" method="post">
        <div class="from-group">
			<label>Tahun</label>
			<input type="number" name="tahun" class="form-control" placeholder="Masukan tahun" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Luar Negri</label>
			<input type="number" name="luar_negri" class="form-control" placeholder="Masukan Pagu Luar Negri" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Dalam Negri</label>
			<input type="number" name="dalam_negri" class="form-control" placeholder="Masukan Pagu Dalam Negri" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Dalam Kota</label>
			<input type="number" name="dalam_kota" class="form-control" placeholder="Masukan Pagu Dalam Kota" required="">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

<?php foreach($anggaran as $a) : ?>
<!-- Modal edit tahun -->
<div class="modal fade" id="edit_tahun<?= $a['anggaran_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Tahun_anggaran/edit_tahun_anggaran') ?>" method="post">
	<input type="hidden" value="<?= $a['anggaran_id'] ?>" name="id">
        <div class="from-group">
			<label>Tahun</label>
			<input type="number" value="<?= $a['anggaran_tahun'] ?>" name="tahun" class="form-control" placeholder="Masukan tahun" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Luar Negri</label>
			<input type="number" value="<?= $a['anggaran_luar_negri'] ?>" name="luar_negri" class="form-control" placeholder="Masukan Pagu Luar Negri" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Dalam Negri</label>
			<input type="number" value="<?= $a['anggaran_dalam_negri'] ?>" name="dalam_negri" class="form-control" placeholder="Masukan Pagu Dalam Negri" required="">
		</div>
		<br>
        <div class="from-group">
			<label>Pagu Dalam Kota</label>
			<input type="number" value="<?= $a['anggaran_dalam_kota'] ?>" name="dalam_kota" class="form-control" placeholder="Masukan Pagu Dalam Kota" required="">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">edit</button>
	  </div>
	  </form>
    </div>
  </div>
</div>
<?php endforeach ?>
<?php foreach($anggaran as $a) : ?>
<div class="modal fade" id="hapus_tahun<?= $a['anggaran_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Tahun_anggaran/hapus_tahun_anggaran') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus ?</h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $a['anggaran_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>