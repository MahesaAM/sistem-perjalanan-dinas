<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">partai</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_partai">Tambah partai</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width: 100%;" class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>partai</th>
										<th style="width: 200px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($partai as $k) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $k['partai_nama'] ?></td>
                                        <td style="text-align: center;">
											<button  data-toggle="modal" data-target="#edit_partai<?= $k['partai_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_partai<?= $k['partai_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        

<!-- Modal tambah partai -->
<div class="modal fade" id="tambah_partai" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Partai/tambah_partai') ?>" method="post">
        <div class="from-group">
			<label>partai</label>
			<input type="text" name="partai" class="form-control" placeholder="Masukan partai" required="">
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

<!-- Modal hapus partai -->
<?php foreach ($partai as $k) : ?>
<div class="modal fade" id="hapus_partai<?= $k['partai_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Partai/hapus_partai') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $k['partai_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $k['partai_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- Modal edit partai -->
<?php foreach($partai as $k) : ?>
<div class="modal fade" id="edit_partai<?= $k['partai_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Partai/edit_partai') ?>" method="post">
		<input type="hidden" value="<?= $k['partai_id'] ?>" name="id">
        <div class="from-group">
			<label>partai</label>
			<input type="text" name="partai" value="<?= $k['partai_nama'] ?>" class="form-control" placeholder="Masukan partai" required="">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
	  </div>
	  </form>
    </div>
  </div>
</div>
<?php endforeach ?>