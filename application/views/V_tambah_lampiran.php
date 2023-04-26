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
        <form action="<?= base_url('Sppd_notulis/tambah_notulis') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id">
        <div class="form-group">
        <label>Biaya Biaya Sbb</label>
        <table class="table table-bordered">
            <tr>
                <td><input type="text" readonly="" class="form-control" value="Hotel" name="ket[]"></td>
                <td style="width: 30%;"><input type="number" class="form-control tot" name="val[]" min="0" required=""></td>
            </tr>
            <tr>
                <td><input type="text" readonly="" class="form-control" value="Tiket Pesawat / KA" name="ket[]"></td>
                <td style="width: 30%;"><input type="number" class="form-control tot" name="val[]" min="0" required=""></td>
            </tr>
            <tr>
                <td><input type="text" readonly="" class="form-control" value="Sewa Bus / Akomodasi" name="ket[]"></td>
                <td style="width: 30%;"><input type="number" class="form-control tot" name="val[]" min="0" required=""></td>
            </tr>
            <tr>
                <td><input type="text" readonly="" class="form-control" value="Total Uang Harian" name="ket[]"></td>
                <td style="width: 30%;"><input type="number" class="form-control tot" name="val[]" min="0" required=""></td>
            </tr>
            <tfoot>
                <tr><td style="text-align: center;"><input type="text" readonly="" class="form-control" value="Total" name="ket_tot"></td><td><input type="number" class="form-control" readonly="" id="total" name="val_tot"></td></tr>
            </tfoot>
        </table>
    </div>
    <div class="form-group">
    <div class="col-sm-6">
        <label>Laporan Hasil Perjalanan Dinas</label>
            <table class="table table-bordered table-hover" id="wadah_laporan">
                <tr>
                  <td colspan="2">Tambahkan File</td>
                  <td style="width:100px; text-align:center;">
                  <button type="button" id="tambah_laporan" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
            </table>
            </div>
            <div class="col-sm-6">
        <label>Documentasi</label>
        <table class="table table-bordered table-hover" id="wadah_documentasi">
                <tr>
                  <td colspan="2">Tambahkan File</td>
                  <td style="width:100px; text-align:center;">
                  <button type="button" id="tambah_documentasi" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
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