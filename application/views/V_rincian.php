<div class="row">
	<div class="col-lg-12">
        
        <h1 class="page-header">Rincian </h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <form action="<?= base_url('Sppd/tambah_rincian') ?>" method="post">
                            <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id_anggota">
                            <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="id_sppd">
                            <table style="width: 100%;" class="table" id="wadah">
                                <tr>
                                    <th style="width: 25%;">Perincian Biaya</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Nilai Satuan</th>
                                    <th>Keterangan</th>
                                    <td><button type="button" id="tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></td>
                                </tr>
                                <?php $n=1; foreach($rincian as $r ) : ?>
                                <tr id="row<?= $n; ?>">
                                    <td><input name="perincian_biaya[]" value="<?= $r['rincian_perincian_biaya'] ?>" required="" value="Biaya Penginapan" style="width: 90%;" type="text" class="form-control"></td>
                                    <td><input name="jumlah_satuan[]" value="<?= $r['rincian_jumlah_satuan'] ?>" required="" style="width: 90%;" type="number" class="form-control"></td>
                                    <td><input name="nilai_satuan[]" value="<?= $r['rincian_nilai_satuan'] ?>" required="" style="width: 90%;" type="number" class="form-control"></td>
                                    <td><input name="keterangan[]" value="<?= $r['rincian_keterangan'] ?>" style="width: 90%;" type="text" class="form-control"></td>
                                    <td><button id="<?= $n ?>" type="button" name="hapus" id="" class="btn btn-danger btn_remove">X</button></td>
                                </tr>
                                <?php $n++; endforeach ?>
                            </table>
                            <center>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="<?= base_url('Sppd/nominatif/'.$this->uri->segment(4)) ?>"> Kembali</a>
                            </center>
                            </form>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->