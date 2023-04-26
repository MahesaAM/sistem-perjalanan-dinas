<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Anggota</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_anggota"><i class="fa fa-plus"></i> Tambah Anggota</button>
					<a target="_blank" class="btn btn-warning" href="<?= base_url('Data_anggota/print_anggota') ?>"><i class="fa fa-print"></i> Print</a>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width:100%" class="table table-bordered table-hover table-striped display nowrap" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
										<th>Alamat</th>
										<th>No Hp</th>
										<th>Jabatan</th>
										<th>Partai</th>
										<th>Masa Jabatan</th>
										<th>Komisi</th>
										<th>Jabatan Komisi</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($anggota as $a) : ?>
									<tr>
										<td><?= $a['anggota_nama'] ?></td>
										<td><?= $a['anggota_alamat'] ?></td>
										<td><?= $a['anggota_no_hp'] ?></td>
										<td><?= $a['anggota_jabatan'] ?></td>
										<td><?= $a['anggota_partai'] ?></td>
										<td><?= $a['anggota_masa_jabatan'] ?></td>
										<td><?= $a['anggota_komisi'] ?></td>
										<td><?= $a['anggota_jabatan_komisi'] ?></td>
										<td style="text-align: center">
											<a class="btn btn-primary" href="<?= base_url('Data_anggota/detail_anggota/'.$a['anggota_id']) ?>"><i class="fa fa-eye"></i></a>
											<button  data-toggle="modal" data-target="#edit_anggota<?= $a['anggota_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_anggota<?= $a['anggota_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

		

<!-- Modal tambah anggota -->
<div class="modal fade" id="tambah_anggota"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div style="width: 90%;" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Data_anggota/tambah_anggota') ?>" method="post">
        <div class="row">
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
				<select style="height: 46px" class="form-control" name="jabatan" required="">
						<option value="">--pilih jabatan--</option>
					<?php foreach($jabatan_dprd as $j ) : ?>
						<option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Partai</label>
				<select style="height: 46px" class="form-control" name="partai" required="">
						<option value="">--pilih partai--</option>
					<?php foreach($partai as $p ) : ?>
						<option value="<?= $p['partai_nama'] ?>"><?= $p['partai_nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Masa Jabatan</label>
				<input type="text" class="form-control" name="masa_jabatan" placeholder="YYYY-YYYY" required="">
			</div>
			<div class="col-sm-2">
				<label>Komisi</label>
				<select name="komisi" style="height: 46px;" class="form-control" required="">
						<option value="">--pilih komisi--</option>
					<?php foreach($komisi as $k ) : ?>
						<option value="<?= $k['komisi_nama'] ?>"><?= $k['komisi_nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Jabatan Komisi</label>
				<select name="jabatan_komisi" style="height: 46px;" class="form-control" required="">
						<option value="">--pilih jabatan di komisi--</option>
					<?php foreach($komisi_jabatan as $k ) : ?>
						<option value="<?= $k['jabatan_nama'] ?>"><?= $k['jabatan_nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<br>
			<div class="row">
			<div class="col-sm-6">
			<label>Badan</label>
            <table class="table table-bordered table-hover" id="wadah_badan">
                <tr>
                  <td colspan="2">Tambahkan Badan</td>
                  <td style="width:100px; text-align:center;">
                  <button type="button" id="tambah_badan" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
            </table>
			</div>
			</div>
	<input type="hidden" value="<?= $user['admin_username'] ?>" name="username_input" >
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

<!-- Modal hapus anggota -->
<?php foreach ($anggota as $a) : ?>
<div class="modal fade" id="hapus_anggota<?= $a['anggota_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Data_anggota/hapus_anggota') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus<br><b><?= $a['anggota_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $a['anggota_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


<!-- Modal edit anggota -->
<?php foreach ($anggota as $a) : ?>
<div class="modal fade" id="edit_anggota<?= $a['anggota_id'] ?>"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div style="width: 90%;" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Data_anggota/edit_anggota') ?>" method="post">
	<input type="hidden" value="<?= $a['anggota_id'] ?>" name="id" >
        <div class="row">
			<div class="col-sm-8">
				<label>Nama</label>
				<input type="text" placeholder="Nama"  value="<?= $a['anggota_nama'] ?>" name="nama" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
			<div class="col-sm-10">
				<label>Alamat</label>
				<input type="text" placeholder="Alamat" value="<?= $a['anggota_alamat'] ?>" name="alamat" class="form-control" required="">
			</div>
			<div class="col-sm-2">
				<label>No Hp</label>
				<input type="number" min="0" placeholder="No Hp"  value="<?= $a['anggota_no_hp'] ?>" name="no_hp" class="form-control" required="">
			</div>
		</div>
		<br>
        <div class="row">
			<div class="col-sm-4">
				<label>Jabatan</label>
				<select style="height: 46px" class="form-control" name="jabatan">
					<?php foreach($jabatan_dprd as $j ) : ?>
					<?php if($a['anggota_jabatan']==$j['jabatan_nama']) : ?>
						<option value="<?= $j['jabatan_nama'] ?>" selected><?= $j['jabatan_nama'] ?></option>
					<?php else: ?>
						<option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
					<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Partai</label>
				<select style="height: 46px" class="form-control" name="partai">
					<?php foreach($partai as $p ) : ?>
					<?php if($a['anggota_partai']==$p['partai_nama']) : ?>
						<option value="<?= $p['partai_nama'] ?>" selected><?= $p['partai_nama'] ?></option>
					<?php else: ?>
						<option value="<?= $p['partai_nama'] ?>"><?= $p['partai_nama'] ?></option>
					<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Masa Jabatan</label>
				<input type="text"  value="<?= $a['anggota_masa_jabatan'] ?>" class="form-control" name="masa_jabatan" placeholder="YYYY-YYYY">
			</div>
			<div class="col-sm-2">
				<label>Komisi</label>
				<select name="komisi" style="height: 46px;" class="form-control">
					<?php foreach($komisi as $k ) : ?>
						<?php if($a['anggota_komisi']==$k['komisi_nama']) : ?>
							<option value="<?= $k['komisi_nama'] ?>" selected><?= $k['komisi_nama'] ?></option>
						<?php else: ?> 
							<option value="<?= $k['komisi_nama'] ?>"><?= $k['komisi_nama'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-sm-2">
				<label>Jabatan Komisi</label>
				<select name="jabatan_komisi" style="height: 46px;" class="form-control">
					<?php foreach($komisi_jabatan as $k ) : ?>
					<?php if($a['anggota_jabatan_komisi']==$k['jabatan_nama']) : ?>
						<option value="<?= $k['jabatan_nama'] ?>" selected><?= $k['jabatan_nama'] ?></option>
					<?php else: ?>
						<option value="<?= $k['jabatan_nama'] ?>"><?= $k['jabatan_nama'] ?></option>
					<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<br>
			<div class="row">
			<div class="col-sm-6">
			<label>Badan</label>
            <table class="table table-bordered table-hover" id="wadah_badan_edit<?= $a['anggota_id'] ?>">
                <tr>
                  <td colspan="2">Tambahkan Badan</td>
                  <td style="text-align:center;">
                  <button type="button" id="tambah_badan_edit<?= $a['anggota_id'] ?>" class="btn btn-info">Tambah</button>
                  </td>
				</tr>
				<?php
                            $a_id = $a['anggota_id'];
                            $bdn = $this->db->query("SELECT * FROM tbl_anggota_badan WHERE badan_anggota_id = '$a_id'");
                            $n = 1;
                            foreach ($bdn->result_array() as $bd) : 
                            ?>
                              <tr id="row_edit<?= $a['anggota_id'].$n ?>">
                                <td>
                                <select class="form-control" name="masuk_badan[]">

                                  <?php foreach ($badan as $b) : ?>
                                    <?php if($bd['badan_nama']==$b['badan_nama']) : ?>
                                      <option value="<?= $b['badan_nama'] ?>" selected><?= $b['badan_nama'] ?></option>
                                    <?php else : ?>
                                      <option value="<?= $b['badan_nama'] ?>"><?= $b['badan_nama'] ?></option>
                                    <?php endif ?>
                                  <?php endforeach ?>
                                    
                                  </select>
								</td>
								<td>
								<select class="form-control"  name="masuk_jabatan[]" required="">
									<option value="">-Pilih jabatan-</option>
									<?php foreach($jabatan_badan as $j ) : ?>
									<?php if($bd['badan_jabatan']==$j['jabatan_nama']) : ?>
                                      <option value="<?= $j['jabatan_nama'] ?>" selected><?= $j['jabatan_nama'] ?></option>
                                    <?php else : ?>
                                      <option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option>
                                    <?php endif ?>
									<?php endforeach ?>
								</select>
								</td>
                                <td>
                                    <button type="button" name="hapus" id="<?= $n ?>" class="btn btn-danger btn_remove_edit<?= $a['anggota_id'] ?>">X</button>
                                </td>
                              </tr>

                            <?php $n++; endforeach ?>
            </table>
			</div>
			</div>
	<input type="hidden" value="<?= $user['admin_username'] ?>" name="username_update" >
	<input type="hidden" value="<?= time() ?>" name="date_update" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
	  </div>
	  </form>
    </div>
  </div>
</div>
<?php endforeach ?>