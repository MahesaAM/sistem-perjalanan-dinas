<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Provinsi</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_provinsi"><i class="fa fa-plus"></i> Tambah Provinsi</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($provinsi as $p) : ?>
									<tr>
										<td style="width: 200px"><?= $no++ ?></td>
										<td><?= $p['provinsi_nama'] ?></td>
										<td style="width: 200px; text-align:center;">
											<button  data-toggle="modal" data-target="#edit_provinsi<?= $p['provinsi_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_provinsi<?= $p['provinsi_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        
<!-- Modal tambah provinsi -->
<div class="modal fade" id="tambah_provinsi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Provinsi/tambah_provinsi') ?>" method="post">
        <div class="from-group">
			<label>provinsi</label>
			<input type="text" name="provinsi" class="form-control" placeholder="Masukan provinsi" required="">
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

<?php foreach($provinsi as $p) : ?>
<div class="modal fade" id="hapus_provinsi<?= $p['provinsi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Provinsi/hapus_provinsi') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $p['provinsi_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $p['provinsi_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

        
<!-- Modal edit provinsi -->
<?php foreach($provinsi as $p) : ?>
<div class="modal fade" id="edit_provinsi<?= $p['provinsi_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="<?= base_url('Provinsi/edit_provinsi') ?>" method="post">
        <input type="hidden" value="<?= $p['provinsi_id'] ?>" name="id">
        <div class="from-group">
			<label>provinsi</label>
			<input type="text" name="provinsi" class="form-control" value="<?= $p['provinsi_nama'] ?>" placeholder="Masukan provinsi" required="">
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