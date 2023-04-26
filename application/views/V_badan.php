<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">badan</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_badan">Tambah badan</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width: 100%;" class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>badan</th>
										<th style="width: 200px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($badan as $b) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $b['badan_nama'] ?></td>
										<td style="text-align: center;">
											<button  data-toggle="modal" data-target="#edit_badan<?= $b['badan_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_badan<?= $b['badan_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">jabatan</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_jabatan">Tambah jabatan</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width: 100%;" class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>jabatan</th>
										<th style="width: 200px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($jabatan as $j) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $j['jabatan_nama'] ?></td>
										<td style="text-align: center;">
											<button  data-toggle="modal" data-target="#edit_jabatan<?= $j['jabatan_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_jabatan<?= $j['jabatan_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        

<!-- Modal tambah badan -->
<div class="modal fade" id="tambah_badan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Badan/tambah_badan') ?>" method="post">
        <div class="from-group">
			<label>badan</label>
			<input type="text" name="badan" class="form-control" placeholder="Masukan badan" required="">
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
<!-- Modal tambah jabatan -->
<div class="modal fade" id="tambah_jabatan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Badan/tambah_jabatan') ?>" method="post">
        <div class="from-group">
			<label>jabatan</label>
			<input type="text" name="jabatan" class="form-control" placeholder="Masukan badan" required="">
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

<!-- Modal hapus badan -->
<?php foreach ($badan as $b) : ?>
<div class="modal fade" id="hapus_badan<?= $b['badan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Badan/hapus_badan') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $b['badan_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $b['badan_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<!-- Modal hapus badan -->
<?php foreach ($jabatan as $b) : ?>
<div class="modal fade" id="hapus_jabatan<?= $b['jabatan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Badan/hapus_jabatan') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $b['jabatan_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $b['jabatan_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- Modal edit badan -->
<?php foreach($badan as $b) : ?>
<div class="modal fade" id="edit_badan<?= $b['badan_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Badan/edit_badan') ?>" method="post">
		<input type="hidden" value="<?= $b['badan_id'] ?>" name="id">
        <div class="from-group">
			<label>badan</label>
			<input type="text" name="badan" value="<?= $b['badan_nama'] ?>" class="form-control" placeholder="Masukan badan" required="">
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
<!-- Modal edit badan -->
<?php foreach($jabatan as $j) : ?>
<div class="modal fade" id="edit_jabatan<?= $j['jabatan_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Badan/edit_jabatan') ?>" method="post">
		<input type="hidden" value="<?= $j['jabatan_id'] ?>" name="id">
        <div class="from-group">
			<label>jabatan</label>
			<input type="text" name="jabatan" value="<?= $j['jabatan_nama'] ?>" class="form-control" placeholder="Masukan jabatan" required="">
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