<div class="row">
	<div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Sppd') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
        <h1 class="page-header">Edit SPPD</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <form action="<?= base_url('Sppd/edit_sppd') ?>" enctype="multipart/form-data" method="post">
                            <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id">
                            <div class="form-group">
      <div class="row"> 
        <div class="col-sm-6">
            <label>Perjalanan:</label><br>
            <table style="width:70%">
                <tr>
                    <td>
                    <?php if($sppd['sppd_perjalanan']=="Dalam Daerah") : ?>
                        <input type="radio" name="dalam_luar" checked value="Dalam Daerah" id="dalam">
                    <?php else : ?>
                        <input type="radio" name="dalam_luar" value="Dalam Daerah" id="dalam">
                    <?php endif ?>
                    <label for="dalam">Dalam Daerah</label>
                    </td>
                    <td>
                    <?php if($sppd['sppd_perjalanan']=="Luar Daerah") : ?>
                        <input type="radio" name="dalam_luar" checked value="Luar Daerah" id="luar">
                    <?php else : ?>
                        <input type="radio" name="dalam_luar" value="Luar Daerah" id="luar">
                    <?php endif ?>
                    <label for="luar">Luar Daerah</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <label for="">Jenis Perjalanan Dinas</label>
            <?php $jenis=['Konsultasi','Kunjungan Kerja','Pendamping OPD'] ?>
            <select style="height: 46px" name="jenis_perjalanan" class="form-control">
                <option value="">-Pilih Jenis Perjalanan-</option>
                <?php $n=0; while($n<count($jenis)) : ?>
                <?php if($sppd['sppd_jenis_perjalanan']==$jenis[$n]) : ?>
                    <option value="<?= $jenis[$n] ?>" selected><?= $jenis[$n] ?></option>
                <?php else: ?>
                    <option value="<?= $jenis[$n] ?>"><?= $jenis[$n] ?></option>
                <?php endif ?>
                <?php $n++; endwhile ?>
            </select>
        </div>
      </div>
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label>Nama Kegiatan</label>
          <input placeholder="Maksud Perjalanan Dinas" value="<?= $sppd['sppd_nama_kegiatan'] ?>" type="text" name="nama_kegiatan" class="form-control" required="">
        </div>
        <div class="col-sm-6">
            <label>Tujuan</label>
          <input placeholder="Maksud Perjalanan Dinas" value="<?= $sppd['sppd_tujuan'] ?>" type="text" name="tujuan" class="form-control" required="">
        </div>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label>Lama Perjalanan (Hari) </label>
          <input placeholder="Lama Perjalanan" value="<?= $sppd['sppd_lama_perjalanan'] ?>" type="number" name="lama_perjalanan" class="form-control" required="">
        </div>
        <div class="col-sm-2">
          <label>Tgl Berangkat</label>
          <input type="date" name="tanggal_berangkat" value="<?= $sppd['sppd_tgl_berangkat'] ?>" class="form-control" required="">
        </div>
        <div class="col-sm-2">
          <label>Tgl Kembali</label>
          <input type="date" name="tanggal_kembali" value="<?= $sppd['sppd_tgl_kembali'] ?>" class="form-control" required="">
        </div>
        <div class="col-sm-3">
          <label>No Surat Tugas</label>
          <input placeholder="No Surat Tugas" value="<?= $sppd['sppd_no_surat'] ?>" type="text" name="no_surat_tugas" class="form-control" required="">
        </div>
        <div class="col-sm-3">
          <label>Upload File</label>
          <input type="file" name="upload_surat_tugas" class="form-control"><pre><?= $sppd['upload_no_surat'] ?></pre>
          <input type="hidden" name="file_no_surat" value="<?= $sppd['upload_no_surat'] ?>">
        </div>
      </div>
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-sm-6">
        <label for="">Akun</label>
          <input type="text" class="form-control" value="<?= $sppd['sppd_akun'] ?>" name="akun" required="">
        </div>
        <div class="col-sm-3">
        <label>No SPPD</label>
          <input placeholder="no sppd" type="text" value="<?= $sppd['sppd_no_sppd'] ?>" name="no_sppd" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label>Peserta</label>
          <select style="height: 46px" class="form-control" id="peserta" name="peserta" required="">
          <option value="">-Pilih Peserta-</option>
          <?php foreach($komisi as $k ) : ?>
            <?php if($k['komisi_nama']!=="Pimpinan DPRD"): ?>
              <?php if($k['komisi_nama']==$sppd['sppd_komisi']) : ?>
                <option value="<?= $k['komisi_nama'] ?>" selected><?= $k['komisi_nama'] ?></option>
              <?php else: ?>
                <option value="<?= $k['komisi_nama'] ?>"><?= $k['komisi_nama'] ?></option>
              <?php endif ?>
              <?php endif ?>
            <?php endforeach ?>
          </select>
          <br>
          <?php $id_sppd = $this->uri->segment(3); ?>
          <div id="daftar_pimpinan">
            <label for="">Pimpinan</label>
                <table style="width: 100%;" class="table">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Ikut</th>
                    </tr>
                    </thead>
                    <tbody id="data_pimpinan">
                      <?php
                        $ppn = $this->db->get_where('tbl_anggota', ['anggota_komisi' => "Pimpinan DPRD" ])->result_array();
                        foreach($ppn as $p ):
                      ?>
                        <tr>
                          <td><?= $p['anggota_nama'] ?></td>
                          <td><?= $p['anggota_jabatan'] ?></td>
                          <td>
                                <?php $id_anggota = $p['anggota_id'];
                                    $chk=$this->db->query("SELECT * FROM tbl_sppd_peserta WHERE peserta_anggota_id = '$id_anggota' AND peserta_sppd_id = '$id_sppd' ");
                                    if($chk->num_rows()>0) :
                                ?>
                                    <input type="checkbox" value="<?= $p['anggota_id'] ?>" checked name="ikut[]">
                                <?php else: ?>
                                    <input type="checkbox" value="<?= $p['anggota_id'] ?>" name="ikut[]">
                                <?php endif ?>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                </div>
          <div id="daftar">
                <table style="width: 100%;" class="table">
                    <thead>
                    <tr>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Ikut</th>
                    </tr>
                    </thead>
                    <tbody id="data">
                    <?php foreach($peserta as $p ) : ?>
                        <tr>
                          <td><?= $p['anggota_nama']?></td>
                          <td><?= $p['anggota_jabatan']?></td>
                            <td>
                                <?php $id_anggota = $p['anggota_id'];
                                    $chk=$this->db->query("SELECT * FROM tbl_sppd_peserta WHERE peserta_anggota_id = '$id_anggota' AND peserta_sppd_id = '$id_sppd' ");
                                    if($chk->num_rows()>0) :
                                ?>
                                    <input type="checkbox" value="<?= $p['anggota_id'] ?>" checked name="ikut[]">
                                <?php else: ?>
                                    <input type="checkbox" value="<?= $p['anggota_id'] ?>" name="ikut[]">
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
        </div>
        <div class="col-sm-6">
        <label>Pendamping</label>
            <table class="table table-bordered table-hover" id="wadah_pengikut_edit">
                <tr>
                  <td>Tambahkan Pendamping</td>
                  <td style="width:200px; text-align:center;">
                  <button type="button" id="tambah_pengikut_edit" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
                <?php $no=0; foreach($pengikut as $p ) : ?>
                    <tr id="row_pengikut_edit<?= $no ?>">
                    <td style="width: 80%">
                    <select class="form-control"  name="pengikut[]">
                        <?php foreach($pegawai as $a ): ?>
                            <?php if($p['pengikut_anggota_id']==$a['pegawai_id']) : ?>
                                <option value="<?= $a['pegawai_id'] ?>" selected ><?= $a['pegawai_nip'].' - '. $a['pegawai_nama'] ?></option>
                            <?php else: ?>
                                <option value="<?= $a['pegawai_id'] ?>"><?= $a['pegawai_nip'].' - '. $a['pegawai_nama'] ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                    </td>
                    <td style="text-align: center">
                    <button name="hapus" id="<?= $no ?>" class="btn btn-danger btn_remove_pengikut_edit">X</button>
                    </td>
                </tr>
                <?php $no++; endforeach ?>
            </table>
            </div>
      </div>
    </div>
    <input type="hidden" value="<?= $user['admin_username'] ?>" name="username_update">
    <input type="hidden" value="<?= time() ?>" name="datetime_update">
    
</div>
<div style="float: right;">
    <a class="btn btn-danger" href="<?= base_url('Sppd') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-cogs"></i> Edit SPPD</button>
</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->