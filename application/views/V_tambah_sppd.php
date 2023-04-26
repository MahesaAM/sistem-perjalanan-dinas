<div class="row">
	<div class="col-lg-12">
        <a class="btn btn-danger kembali" href="<?= base_url('Sppd') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
        <h1 class="page-header">Buat SPPD</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper paper">
                            <form action="<?= base_url('Sppd/tambah_sppd') ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
      <div class="row"> 
        <div class="col-sm-6">
            <label>Perjalanan:</label><br>
            <table style="width:70%">
                <tr>
                    <td>
                    <input type="radio" name="dalam_luar" value="Dalam Daerah" id="dalam">
                    <label for="dalam">Dalam Daerah</label>
                    </td>
                    <td>
                    <input type="radio" name="dalam_luar" value="Luar Daerah" id="luar">
                    <label for="luar">Luar Daerah</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <label for="">Jenis Perjalanan Dinas</label>
            <select style="height: 46px" name="jenis_perjalanan" class="form-control">
                <option value="">-Pilih Jenis Perjalanan-</option>
                <option value="Konsultasi">Konsultasi</option>
                <option value="Kunjungan Kerja">Kunjungan Kerja</option>
                <option value="Pendamping OPD">Pendamping OPD</option>
            </select>
        </div>
      </div>
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label>Nama Kegiatan</label>
          <input placeholder="Maksud Perjalanan Dinas" type="text" name="nama_kegiatan" class="form-control" required="">
        </div>
        <div class="col-sm-6">
            <label>Tujuan</label>
          <input placeholder="Maksud Perjalanan Dinas" type="text" name="tujuan" class="form-control" required="">
        </div>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label>Lama Perjalanan (Hari) </label>
          <input placeholder="Lama Perjalanan" type="number" name="lama_perjalanan" class="form-control" required="">
        </div>
        <div class="col-sm-2">
          <label>Tgl Berangkat</label>
          <input type="date" name="tanggal_berangkat" class="form-control" required="">
        </div>
        <div class="col-sm-2">
          <label>Tgl Kembali</label>
          <input type="date" name="tanggal_kembali" class="form-control" required="">
        </div>
        <div class="col-sm-3">
          <label>No Surat Tugas</label>
          <input placeholder="No Surat Tugas" type="text" name="no_surat_tugas" class="form-control" required="">
        </div>
        <div class="col-sm-3">
          <label>Upload File</label>
          <input type="file" name="upload_surat_tugas" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-sm-6">
          <label for="">Akun</label>
          <input type="text" class="form-control" name="akun" required="">
        </div>
        <div class="col-sm-3">
        <label>No SPPD</label>
          <input placeholder="no sppd" type="text" name="no_sppd" class="form-control">
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
                <option value="<?= $k['komisi_nama'] ?>"><?= $k['komisi_nama'] ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
          <br>
          <div style="display: none;" id="daftar_pimpinan">
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
                        <tr><td><?= $p['anggota_nama'] ?></td><td><?= $p['anggota_jabatan'] ?></td><td><input type="checkbox" value="<?= $p['anggota_id'] ?>" name="ikut[]"></td></tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                </div>
          <div style="display: none;" id="daftar">
          <label for="">Anggota</label>
                <table style="width: 100%;" class="table">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Ikut</th>
                    </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                </table>
                </div>
          
          </div>
        <div class="col-sm-6">
        <label>Pendamping</label>
            <table class="table table-bordered table-hover" id="wadah_pengikut">
                <tr>
                  <td>Tambahkan Pendamping</td>
                  <td style="width:200px; text-align:center;">
                  <button type="button" id="tambah_pengikut" class="btn btn-info">Tambah</button>
                  </td>
                </tr>
            </table>
            </div>
      </div>
    </div>
    <input type="hidden" value="<?= $user['admin_username'] ?>" name="username_input">
    <input type="hidden" value="<?= time() ?>" name="datetime_input">
    
</div>
<div style="float: right;">
    <a class="btn btn-danger" href="<?= base_url('Sppd') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Buat SPPD</button>
</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->