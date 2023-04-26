<div class="row">
	<div class="col-lg-12">
        
        <h1 class="page-header">Detail </h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th colspan="2">Perincian Biaya</th>
                                    <th style="text-align: center;" colspan="2">Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                                <?php $n=1; foreach($rincian as $r) : ?>
                                    <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $r['rincian_perincian_biaya'] ?></td>
                                    <td><?= $r['rincian_jumlah_satuan'] ?> x</td>
                                    <td><?= number_format($r['rincian_nilai_satuan']) ?></td>
                                    <td><?= number_format($r['rincian_nilai_satuan']* $r['rincian_jumlah_satuan'])  ?></td>
                                    <td><?= $r['rincian_keterangan'] ?></td>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td style="text-align: center;" colspan="4">Jumlah</td>
                                    <td><?= number_format($jumlah['jumlah']) ?></td>
                                    <td></td>
                                </tr>
                            </table>
                            <center>
                            <a class="btn btn-danger" href="<?= base_url('Sppd/nominatif/'.$this->uri->segment(4)) ?>"> Kembali</a>
                            </center>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->