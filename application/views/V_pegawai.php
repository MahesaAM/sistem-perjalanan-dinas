<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data pegawai</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_pegawai"><i class="fa fa-plus"></i> Tambah pegawai</button>
					<a target="_blank" class="btn btn-warning" href="<?= base_url('Data_pegawai/print_pegawai') ?>"><i class="fa fa-print"></i> Print</a>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width:100%" class="table table-bordered table-hover table-striped display nowrap" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Golongan</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
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
                                        <td>
                                        <button  data-toggle="modal" data-target="#edit_pegawai<?= $p['pegawai_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_pegawai<?= $p['pegawai_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
<!-- Modal tambah pegawai -->
<div class="modal fade" id="tambah_pegawai"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div style="width: 90%;" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Data_pegawai/tambah_pegawai') ?>" method="post">
        <div class="row">
			<div class="col-sm-4">
				<label>Nip</label>
				<input id="nip_p" type="text" placeholder="Nip" name="nip" class="form-control" required="">
				<span id="ket_nip_p"></span>
			</div>
			<div class="col-sm-8">
				<label>Nama</label>
				<input type="text" placeholder="Nama" name="nama" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
			<div class="col-sm-10">
				<label>Alamat</label>
				<input type="text" placeholder="Alamat" name="alamat" class="form-control" required="">
			</div>
			<div class="col-sm-2">
				<label>No Hp</label>
				<input type="number" min="0" placeholder="No Hp" name="no_hp" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
		<div class="col-sm-4">
				<label>Jabatan</label>
				<select style="height: 46px" class="form-control" name="jabatan">
					<option value="">--Pilih Jabatan--</option>
					<?php foreach($jabatan as $j ) : ?>
						<option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-4">
				<label>Pangkat / Golongan</label>
				<select style="height: 46px" class="form-control" name="golongan">
					<option value="">--Pilih Golongan--</option>
					<?php foreach($golongan as $g ) : ?>
						<option value="<?= $g['golongan_title'] ?>"><?= $g['golongan_title'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	<input type="hidden" value="<?= $user['admin_id'] ?>" name="username_input" >
	<input type="hidden" value="<?= time() ?>" name="date_input" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
	  </div>
	  </form>
    </div>
  </div>
</div>
<?php foreach($pegawai as $p) : ?>
<!-- Modal edit pegawai -->
<div class="modal fade" id="edit_pegawai<?= $p['pegawai_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div style="width: 90%;" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Data_pegawai/edit_pegawai') ?>" method="post">
        <div class="row">
			<div class="col-sm-4">
				<label>Nip</label>
				<input id="nip_p" disabled value="<?= $p['pegawai_nip'] ?>" type="text" placeholder="Nip" name="nip" class="form-control" required="">
				<span id="ket_nip_p"></span>
			</div>
			<div class="col-sm-8">
				<label>Nama</label>
				<input type="text" value="<?= $p['pegawai_nama'] ?>" placeholder="Nama" name="nama" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
			<div class="col-sm-10">
				<label>Alamat</label>
				<input type="text" value="<?= $p['pegawai_alamat'] ?>" placeholder="Alamat" name="alamat" class="form-control" required="">
			</div>
			<div class="col-sm-2">
				<label>No Hp</label>
				<input type="number" value="<?= $p['pegawai_nohp'] ?>" min="0" placeholder="No Hp" name="no_hp" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
		<div class="col-sm-4">
				<label>Jabatan</label>
				<select style="height: 46px" class="form-control" name="jabatan">
					<option value="">--Pilih Jabatan--</option>
					<?php foreach($jabatan as $j ) : ?>
					<?php if($p['pegawai_jabatan']==$j['jabatan_nama']) : ?>
						<option value="<?= $j['jabatan_nama'] ?>" selected><?= $j['jabatan_nama'] ?></option>
					<?php else: ?>
						<option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
					<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-4">
				<label>Pangkat / Golongan</label>
				<select style="height: 46px" class="form-control" name="golongan">
					<option value="">--Pilih Golongan--</option>
					<?php foreach($golongan as $g ) : ?>
						<?php if($p['pegawai_golongan']==$g['golongan_title']) : ?>
							<option value="<?= $g['golongan_title'] ?>" selected><?= $g['golongan_title'] ?></option>
						<?php else: ?>
							<option value="<?= $g['golongan_title'] ?>"><?= $g['golongan_title'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	<input type="hidden" value="<?= $p['pegawai_id'] ?>" name="id" >
	<input type="hidden" value="<?= $user['admin_id'] ?>" name="username_update" >
	<input type="hidden" value="<?= time() ?>" name="date_update" >
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
<?php foreach($pegawai as $p) : ?>
<div class="modal fade" id="hapus_pegawai<?= $p['pegawai_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Data_pegawai/hapus_pegawai') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $p['pegawai_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $p['pegawai_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>