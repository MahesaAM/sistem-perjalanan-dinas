<div class="row">
	<div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Sppd_notulis') ?>"> Kembali</a>
        <h1 class="page-header">Upload Notulen & Perjalanan Dinas</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
        <form action="<?= base_url('Sppd_notulis/edit_notulis') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id">
        <div class="form-group">
        <label>Biaya Biaya Sbb</label>
        <table class="table table-bordered">
            <?php foreach($biaya as $b) : ?>
            <?php if($b['biaya_ket']!=="Total"): ?>
                <tr>
                    <td><input type="text" readonly="" class="form-control" value="<?= $b['biaya_ket'] ?>" name="ket[]"></td>
                    <td style="width: 30%;"><input type="number" class="form-control tot" value="<?= $b['biaya_val'] ?>" name="val[]" min="0" required=""></td>
                </tr>
            <?php endif ?>
            <?php endforeach ?>
            <tfoot>
                <tr><td style="text-align: center;"><input type="text" readonly="" class="form-control" value="Total" name="ket_tot"></td><td><input type="number" class="form-control" value="<?= $sppd['sppd_biaya'] ?>" readonly="" id="total" name="val_tot"></td></tr>
            </tfoot>
        </table>
    </div>
    <div class="form-group">
    <div class="col-sm-6">
        <label>Laporan Hasil Perjalanan Dinas</label>
            <table class="table table-bordered table-hover" id="wadah_laporan_edit">
                <tr>
                  <td colspan="2">Tambahkan File</td>
                  <td style="width:100px; text-align:center;">
                  <button type="button" id="tambah_laporan_edit" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
                <?php $n=1; foreach($laporan as $l): ?>
                <tr id="row_laporan_edit<?= $n ?>">
                    <td><input type="text" placeholder="Keterangan" value="<?= $l['laporan_keterangan'] ?>" class="form-control" name="nama_laporan[]" required="" ><input type="hidden" value="<?= $l['laporan_file'] ?>" class="form-control" name="nama_file_laporan[]" required="" ></td>
                    <td><input type="file" class="form-control" name="laporan[]"><pre><?= $l['laporan_file'] ?></pre></td>
                    <td style="text-align: center"><button type="button" name="hapus" id="<?= $n ?>" class="btn btn-danger btn_remove_laporan_edit">X</button></td>
                </tr>
                <?php $n++; endforeach ?>
            </table>
            </div>
            <div class="col-sm-6">
        <label>Documentasi</label>
        <table class="table table-bordered table-hover" id="wadah_documentasi_edit">
                <tr>
                  <td colspan="2">Tambahkan File</td>
                  <td style="width:100px; text-align:center;">
                  <button type="button" id="tambah_documentasi_edit" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
                <?php $n=0; foreach($documentasi as $d): ?>
                    <tr id="row_documentasi_edit<?= $n ?>">
                    <td><input type="file" class="form-control" name="documentasi[]" id="file-ip-1" accept="image/*" onchange="showPreview(event,<?= $n ?>);"><input type="hidden" value="<?= $d['documentasi_file'] ?>" class="form-control" name="nama_file_documentasi[]" required="" ></td>
                    <td><textarea name="nama_documentasi[]" cols="20" rows="2" required=""><?= $d['documentasi_keterangan'] ?></textarea></td>
                    <td style="text-align: center"><button type="button" name="hapus" id="<?= $n ?>" class="btn btn-danger btn_remove_documentasi_edit">X</button></td>
                    </tr>
                    <tr id="row_p_documentasi_edit<?= $n ?>">
                        <td colspan="2"><img style="width:300px;" src="<?= base_url('uploads/'.$d['documentasi_file']) ?>" id="file-ip-1-preview'+d+'"></td>
                    </tr>
                <?php $n++; endforeach ?>
            </table>
            </div>
    </div>
    <div style="float: right;">
    <a class="btn btn-danger" href="<?= base_url('Sppd_notulis') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Upload SPPD</button>
</div>
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div><!--/.row-->