<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data kota</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_kota"><i class="fa fa-plus"></i> Tambah kota</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($kota as $k) : ?>
									<tr>
										<td style="width: 200px"><?= $no++ ?></td>
										<td><?= $k['kota_nama'] ?></td>
										<td><?= $k['kota_provinsi'] ?></td>
										<td style="width: 200px; text-align: center;">
											<button  data-toggle="modal" data-target="#edit_kota<?= $k['kota_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_kota<?= $k['kota_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        
<!-- Modal tambah kota -->
<div class="modal fade" id="tambah_kota" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Kota/tambah_kota') ?>" method="post">
    <div class="from-group">
			<label>kota</label>
			<input type="text" name="kota" class="form-control" placeholder="Masukan kota" required="">
    </div>
    <div class="from-group">
			<label>Provinsi</label>
			<select name="provinsi" class="form-control">
        <?php foreach($provinsi as $p ) : ?>
          <option value="<?= $p['provinsi_nama'] ?>"><?= $p['provinsi_nama'] ?></option>
        <?php endforeach ?>
      </select>
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

<?php foreach($kota as $k) : ?>
<div class="modal fade" id="hapus_kota<?= $k['kota_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('kota/hapus_kota') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $k['kota_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $k['kota_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

        
<!-- Modal edit kota -->
<?php foreach($kota as $k) : ?>
<div class="modal fade" id="edit_kota<?= $k['kota_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="<?= base_url('kota/edit_kota') ?>" method="post">
        <input type="hidden" value="<?= $k['kota_id'] ?>" name="id">
        <div class="from-group">
			<label>kota</label>
			<input type="text" name="kota" class="form-control" value="<?= $k['kota_nama'] ?>" placeholder="Masukan kota Anggota" required="">
    </div>
    <div class="from-group">
			<label>Provinsi</label>
			<select name="provinsi" class="form-control">
        <?php foreach($provinsi as $p ) : ?>
          <?php if($p['provinsi_nama']==$k['kota_provinsi']) : ?>
            <option value="<?= $p['provinsi_nama'] ?>" selected><?= $p['provinsi_nama'] ?></option>
          <?php else : ?>
            <option value="<?= $p['provinsi_nama'] ?>"><?= $p['provinsi_nama'] ?></option>
          <?php endif ?>
        <?php endforeach ?>
      </select>
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