<div class="row">
	<div class="col-lg-12">
    <a class="btn btn-danger kembali" href="<?= base_url('Sppd/list_peserta/'.$this->uri->segment(3)) ?>"> Kembali</a>
        <h1 class="page-header">Laporan Perjalanan Dinas</h1>
	</div>
</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                    <?php $id_sppd = $this->uri->segment(3); ?>
                        <?php $id_peserta = $this->uri->segment(4); ?>
                        <a target="_blank" href="<?= base_url('Sppd/print_spd_pendamping/'.$id_sppd.'/'.$id_peserta) ?>" style="float: right; position:relative;" class="btn btn-info"><i class="fa fa-print"></i></a>
						<div class="canvas-wrapper paper">
                            <center>
                            <table style="width: 80%;">
                                <tr>
                                    <td style="width: 100px;" rowspan="2"><img style="width: 100px;" src="<?= base_url('assets/image/logo_dprd.png') ?>" alt=""></td>
                                    <td colspan="2" style="text-align: center;"><h3><b>DEWAN PERWAKILAN RAKYAT DAERAH <br>KOTA SEMARANG</b></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;font-size:18px;">Alamat : Jl. Pemuda No. 146 Telp. (024) 3556335 Fax. (024) 3547146 Semarang 50132</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div style="width: 100%; height:5px; background-color:black;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="width: 30%;">
                                    <table>
                                        <tr>
                                            <td>Lembar Ke</td>
                                            <td> : </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Kode No</td>
                                            <td> : </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor</td>
                                            <td> : </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    </td>
                                </tr>
                            </table>
                            </center>
                            <h4 style="text-align: center; font-weight: bold;"><u>SURAT PERJALANAN DINAS</u></h4>
                            <h4 style="text-align: center">(SPD)</h4>
                            <div style="margin-left: 100px; margin-right: 100px;">

                            <table class="table table-bordered">
                                <tr>
                                    <td>1</td>
                                    <td style="width:47%;">Pengguna Anggaran</td>
                                    <td>Seketaris DPRD Kota Semarang</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nama / NIP Pegawai Yang Melaksanakan Perjalanan Dinas</td>
                                    <td>
                                        <?= $p['pegawai_nama'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                         a. Pangkat dan Golongan <br>
                                         b. Jabatan / Instansi
                                    </td>
                                    <td>
                                        <?= $p['pegawai_golongan'] ?> <br>
                                        <?= $p['pegawai_jabatan'] ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        Maksud Perjalanan Dinas
                                    </td>
                                    <td><?= $s['sppd_tujuan'] ?></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        a. Lama Prjalanan <br>
                                        b. Tanggal Brangkat <br>
                                        c. Tanggal Harus Kembali/Tiba ditempat baru
                                    </td>
                                    <td>
                                        <?= $s['sppd_lama_perjalanan'] ?> Hari <br>
                                        <?= $s['sppd_tgl_berangkat'] ?> <br>
                                        <?= $s['sppd_tgl_kembali'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>
                                        Pendamping : Nama
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>
                                        Pembebanan Anggaran <br>
                                        a. Instansi <br>
                                        b. Akun
                                    </td>
                                    <td>
                                        Seketariat DPRD Kota Semarang <br>
                                        <?= $s['sppd_akun'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>
                                        Keterangan Lain lain
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td>
                                        <table style="width: 50%;">
                                            <tr>
                                                <td>Dikeluarkan Di</td>
                                                <td> : </td>
                                                <td><?= $t['kota'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pada Tanggal</td>
                                                <td> : </td>
                                                <td><?= $s['sppd_tanggal'] ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 100%;margin-top:20px;">
                                <tr>
                                    <td style="text-align: center; font-weight:bold;width:50%;">Tanda Tangan Pemegang</td>
                                    <td style="text-align: center; font-weight:bold;"><?= $t['text_header_kanan'] ?></td>
                                </tr>
                            </table>
                            <table style="width: 100%;margin-top:100px;">
                                <tr>
                                    <td style="text-align: center; font-weight:bold;width:50%;"><?= $p['pegawai_nama'] ?></td>
                                    <td style="text-align: center; font-weight:bold;"><?= $a['pegawai_nama'] ?></td>
                                </tr>
                            </table>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->

        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <?php $url = $this->uri->segment(3); ?>
						<div class="canvas-wrapper paper">
                        <div style="margin-left: 100px; margin-right: 100px;margin-top:40px;">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width: 50%;"></td>
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>Berangkat dari</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2"></td>
                                                            <td>Ke</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>II.</td>
                                                            <td>Tiba Di</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>Berangkat dari</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ke</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>III.</td>
                                                            <td>Tiba Di</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>Berangkat dari</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ke</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>IV.</td>
                                                            <td>Tiba Di</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>Berangkat dari</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ke</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>V.</td>
                                                            <td>Tiba Di</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>Berangkat dari</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ke</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    (..................................)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>VI.</td>
                                                            <td>Tiba Di</td>
                                                            <td> : </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Pada Tanggal</td>
                                                            <td> : </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align: center;">
                                        Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat singkatnya <br>
                                        <b><?= $t['text_header_bawah'] ?></b><br><br><br><br><b><?= $b['pegawai_nama'] ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VII. Catatan Lain-lain</td>
                                    <td></td>
                                </tr>
                            </table>
                            </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div><!--/.row-->