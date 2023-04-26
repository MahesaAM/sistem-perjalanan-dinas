<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Sppd') ?>"> Kembali</a>
        <h1 class="page-header">Daftar Peserta dan Pendamping</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
                            <label for="">Peserta</label>
							<table style="width: 100%;" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th style="width: 200px; text-align: center;">Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($peserta as $p ) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['peserta_nama'] ?></td>
                                    <?php $id = $p['peserta_anggota_id']; $a = $this->db->query("SELECT * FROM tbl_anggota WHERE anggota_id = '$id'")->row_array(); ?>
                                    <td><?= $a['anggota_jabatan'] ?></td>
                                    <td style="text-align: center;"><a href="<?= base_url('Sppd/spd_peserta/'.$this->uri->segment(3).'/'.$p['peserta_anggota_id']) ?>" class="btn btn-primary"><i class="fa fa-print"></i></a></td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <label for="">Pendamping</label>
							<table style="width: 100%;" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th style="width: 200px; text-align: center;">Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($pengikut as $p ) : ?>
                                <tr>
                                    <?php $id = $p['pengikut_anggota_id']; $a = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai_id = '$id'")->row_array(); ?>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['pegawai_nama'] ?></td>
                                    <td><?= $a['pegawai_jabatan'] ?></td>
                                    <td style="text-align: center;"><a href="<?= base_url('Sppd/spd_pendamping/'.$this->uri->segment(3).'/'.$p['pengikut_anggota_id']) ?>" class="btn btn-primary"><i class="fa fa-print"></i></a></td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->