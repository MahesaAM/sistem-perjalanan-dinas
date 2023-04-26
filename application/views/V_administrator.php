<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data admin</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_admin"><i class="fa fa-plus"></i> Tambah admin</button>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table style="width: 100%;" class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $no=1; foreach ($admin as $a) : ?>
									<tr>
										<td style="width: 200px"><?= $no++ ?></td>
										<td><?= $a['admin_nama'] ?></td>
										<td><?= $a['admin_username'] ?></td>
										<td><?= $a['admin_level'] ?></td>
										<td style="width: 200px; text-align:center;">
											<button  data-toggle="modal" data-target="#edit_admin<?= $a['admin_id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
											<button  data-toggle="modal" data-target="#hapus_admin<?= $a['admin_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        
<!-- Modal tambah admin -->
<div class="modal fade" id="tambah_admin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url('Administrator/tambah_admin') ?>" method="post">
        <div class="from-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required="">
		</div>
        <div class="from-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukan Username" required="">
		</div>
        <div class="from-group">
			<label>Password</label>
			<input type="password" id="p" name="password" class="form-control" placeholder="Masukan Password" required="">
        </div>
        <input type="checkbox" onchange="seePassword(this);"><span id="check"> Lihat password</span>
        <div class="form-group">
          <label>Level</label>
          <select name="level" class="form-control" required="">
            <option value="">-Pilih Level Pengguna-</option>
            <option value="admin">Admin</option>
            <option value="notulis">Notulis</option>
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

<?php foreach($admin as $a) : ?>
<div class="modal fade" id="hapus_admin<?= $a['admin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= base_url('Administrator/hapus_admin') ?>" method="post">
        <h3>Apakah Anda Yakin Ingin Menghapus <b><?= $a['admin_nama'] ?></b></h3>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		<input type="hidden" name="id" value="<?= $a['admin_id'] ?>">	
		<button type="submit" class="btn btn-danger">Iya</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

        
<!-- Modal edit admin -->
<?php foreach($admin as $a) : ?>
    <div class="modal fade" id="edit_admin<?= $a['admin_id'] ?>" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="<?= base_url('Administrator/edit_admin') ?>" method="post">
    <input type="hidden" value="<?= $a['admin_id'] ?>" name="id">
        <div class="from-group">
			<label>Nama</label>
			<input type="text" name="nama" value="<?= $a['admin_nama'] ?>" class="form-control" placeholder="Masukan Nama" required="">
		</div>
        <div class="from-group">
			<label>Username</label>
			<input type="text" name="username" value="<?= $a['admin_username'] ?>" class="form-control" placeholder="Masukan Usernam" required="">
		</div>
        <div class="from-group">
			<label>Password</label>
			<input type="password" id="p<?= $a['admin_id'] ?>" name="password" class="form-control" placeholder="Masukan Jika Ingin Mengubah Password" >
        </div>
            <input type="hidden" value="<?= $a['admin_password'] ?>" name="password_h" >
        <input type="checkbox" onchange="seePassword<?= $a['admin_id'] ?>(this);"><span id="check<?= $a['admin_id'] ?>"> Lihat password</span>
        <div class="form-group">
          <label>Level</label>
          <select name="level" class="form-control" required="">
            <?php if($a['admin_level']=="admin"): ?>
              <option value="admin" selected>Admin</option>
            <?php else: ?>
              <option value="admin">Admin</option>
            <?php endif ?>
            <?php if($a['admin_level']=="notulis"): ?>
              <option value="notulis" selected>Notulis</option>
            <?php else: ?>
              <option value="notulis">Notulis</option>
            <?php endif ?>
          </select>
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

<script>
            function seePassword(x) {
                var checkbox = x.checked;
                if (checkbox) {
                    document.getElementById("p").type="text";
                    document.getElementById("check").textContent=" sembunyikan";
                }else{
                    document.getElementById("p").type="password";
                    document.getElementById("check").textContent=" lihat";

                }
            }
</script>

<?php foreach($admin as $a ) : ?>
    <script>
            function seePassword<?= $a['admin_id'] ?>(x) {
                var checkbox = x.checked;
                if (checkbox) {
                    document.getElementById("p<?= $a['admin_id'] ?>").type="text";
                    document.getElementById("check<?= $a['admin_id'] ?>").textContent=" sembunyikan";
                }else{
                    document.getElementById("p<?= $a['admin_id'] ?>").type="password";
                    document.getElementById("check<?= $a['admin_id'] ?>").textContent=" lihat";

                }
            }
        </script>
<?php endforeach ?>