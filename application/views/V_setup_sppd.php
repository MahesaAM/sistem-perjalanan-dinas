<div class="row">
	<div class="col-lg-12">
    <button data-toggle="modal" data-target="#edit" class="btn btn-primary kembali"><i class="fa fa-cogs"></i> Edit</button>
        <h1 class="page-header">Setup SPPD</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div style="margin-left: 100px; margin-right:100px;" class="canvas-wrapper paper">
                            <hr>
                            <table style="width: 60%;">
                                <tr>
                                    <td style="width: 30%">Text Header 1</td>
                                    <td> : </td>
                                    <td><?= $s['text_header_kanan'] ?></td>
                                </tr>
                            </table>
                            <hr>
                            <table style="width: 60%;">
                                <tr>
                                    <td style="width: 30%">Anggota</td>
                                    <td> : </td>
                                    <td><?= $s['pegawai_kanan'] ?></td>
                                </tr>
                            </table>
                            <hr>
                            <table style="width: 60%;">
                                <tr>
                                    <td style="width: 30%;">Kota</td>
                                    <td> : </td>
                                    <td><?= $s['kota'] ?></td>
                                </tr>
                            </table>
                            <hr>
                            <table style="width: 60%;">
                                <tr>
                                    <td style="width: 30%">Text Header 2</td>
                                    <td> : </td>
                                    <td><?= $s['text_header_bawah'] ?></td>
                                </tr>
                            </table>
                            <hr>
                            <table style="width: 60%;">
                                <tr>
                                    <td style="width: 30%">Anggota</td>
                                    <td> : </td>
                                    <td><?= $s['pegawai_bawah'] ?></td>
                                </tr>
                            </table>
                            <hr>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Setup_sppd/edit_setup') ?>" method="post">
        <div class="form-groub">
            <label>Text Header 1</label>
            <textarea required="" class="form-control" name="header_kanan" cols="30" rows="3"><?= $s['text_header_kanan'] ?></textarea>
        </div>
        <br>
        <div class="form-groub">
            <label>Pegawai</label>
            <select required="" name="pegawai_kanan" class="form-control">
            <?php foreach($anggota as $a ) : ?>
                <?php if(strtolower($a['anggota_komisi'])=="pimpinan dprd") : ?>
                    <?php if($a['anggota_nama']==$s['pegawai_kanan']): ?>
                    <option value="<?= $a['anggota_nama'] ?>" selected><?= $a['anggota_nama'] ?></option>
                <?php else: ?>
                    <option value="<?= $a['anggota_nama'] ?>"><?= $t['pegawai_kanan'] ?></option>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <div class="from-groub">
            <label>Kota</label>
            <input type="text" class="form-control" value="<?= $s['kota'] ?>" name="kota">
        </div>
        <br>
        <div class="form-groub">
            <label>Text Header 2</label>
            <textarea required="" class="form-control" name="header_bawah" cols="30" rows="3"><?= $s['text_header_bawah'] ?></textarea>
        </div>
        <br>
        <div class="form-groub">
            <label>Pegawai</label>
            <select required="" name="pegawai_bawah" class="form-control">
            <?php foreach($anggota as $a ) : ?>
                <?php if(strtolower($a['anggota_komisi'])=="pimpinan dprd"): ?>
                    <?php if($a['anggota_nama']==$s['pegawai_bawah']): ?>
                    <option value="<?= $a['anggota_nama'] ?>" selected><?= $a['anggota_nama'] ?></option>
                    <?php else: ?>
                    <option value="<?= $a['anggota_nama'] ?>"><?= $a['anggota_nama'] ?></option>
                <?php endif ?>
                <?php endif ?>
            <?php endforeach ?>
            </select>
        </div>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>