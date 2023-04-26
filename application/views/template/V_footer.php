
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/dataTable.js') ?>"></script>
	<script>
		$(document).ready(function(){
			$("#nip").change(function(){
				var nip = $(this).val();
        		if (nip != '' ) {
					$.ajax({
						url:"<?php echo base_url('Data_anggota/check_nip'); ?>",  
                     	method:"POST",  
                     	data:{nip:nip},  
                     	success:function(data){  
                          $('#ket_nip').html(data);  
                     	}  
					});
				}
      		});
			
			  $("#nip_p").change(function(){
				var nip = $(this).val();
        		if (nip != '' ) {
					$.ajax({
						url:"<?php echo base_url('Data_pegawai/check_nip'); ?>",  
                     	method:"POST",  
                     	data:{nip:nip},  
                     	success:function(data){  
                          $('#ket_nip_p').html(data);  
                     	}  
					});
				}
      		});
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var i = 0;
		$('#tambah_pengikut').click(function(){
			i++;
			$('#wadah_pengikut').append('<tr id="row_pengikut'+i+'"><td style="width: 80%"><select class="form-control"  name="pengikut[]" required=""><option value="" >-Pilih Pendamping-</option><?php foreach($pegawai as $p ): ?><option value="<?= $p['pegawai_id'] ?>"><?= $p['pegawai_nip'].' - '. $p['pegawai_nama'] ?></option><?php endforeach ?></select></td><td style="text-align: center"><button name="hapus" id="'+i+'" class="btn btn-danger btn_remove_pengikut">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_pengikut', function(){
			var button_id = $(this).attr("id");
			$('#row_pengikut'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var i = <?= count($pengikut)-1 ?>;
		$('#tambah_pengikut_edit').click(function(){
			i++;
			$('#wadah_pengikut_edit').append('<tr id="row_pengikut_edit'+i+'"><td style="width: 80%"><select class="form-control"  name="pengikut[]"><option value="" >-Pilih Pendamping-</option><?php foreach($pegawai as $p ): ?><option value="<?= $p['pegawai_id'] ?>"><?= $p['pegawai_nip'].' - '. $p['pegawai_nama'] ?></option><?php endforeach ?></select></td><td style="text-align: center"><button name="hapus" id="'+i+'" class="btn btn-danger btn_remove_pengikut_edit">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_pengikut_edit', function(){
			var button_id = $(this).attr("id");
			$('#row_pengikut_edit'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var l = 0;
		$('#tambah_laporan').click(function(){
			l++;
			$('#wadah_laporan').append('<tr id="row_laporan'+l+'"><td><input type="text" placeholder="Keterangan" class="form-control" name="nama_laporan[]" required="" ></td><td><input type="file" class="form-control" name="laporan[]" required=""></td><td style="text-align: center"><button name="hapus" id="'+l+'" class="btn btn-danger btn_remove_laporan">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_laporan', function(){
			var button_id = $(this).attr("id");
			$('#row_laporan'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var l = <?= count($laporan)-1 ?>;
		$('#tambah_laporan_edit').click(function(){
			l++;
			$('#wadah_laporan_edit').append('<tr id="row_laporan_edit'+l+'"><td><input type="text" placeholder="Keterangan" class="form-control" name="nama_laporan[]" required="" ><input type="hidden" class="form-control" name="nama_file_laporan[]" ></td><td><input type="file" class="form-control" name="laporan[]" ></td><td style="text-align: center"><button name="hapus" id="'+l+'" class="btn btn-danger btn_remove_laporan_edit">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_laporan_edit', function(){
			var button_id = $(this).attr("id");
			$('#row_laporan_edit'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var d = 0;
		$('#tambah_documentasi').click(function(){
			d++;
			$('#wadah_documentasi').append('<tr id="row_documentasi'+d+'"><td><input type="text" placeholder="keterangan" class="form-control" name="nama_documentasi[]" required="" ></td><td><input type="file" class="form-control" name="documentasi[]" required=""></td><td style="text-align: center"><button name="hapus" id="'+d+'" class="btn btn-danger btn_remove_documentasi">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_documentasi', function(){
			var button_id = $(this).attr("id");
			$('#row_documentasi'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var d = <?= count($documentasi)-1 ?>;
		$('#tambah_documentasi_edit').click(function(){
			d++;
			$('#wadah_documentasi_edit').append('<tr id="row_documentasi_edit'+d+'"><td><input type="text" placeholder="keterangan" class="form-control" name="nama_documentasi[]" required="" ><input type="hidden" class="form-control" name="nama_file_documentasi[]" ></td><td><input type="file" class="form-control" name="documentasi[]" ></td><td style="text-align: center"><button name="hapus" id="'+d+'" class="btn btn-danger btn_remove_documentasi_edit">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_documentasi_edit', function(){
			var button_id = $(this).attr("id");
			$('#row_documentasi_edit'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
			<?php foreach($sppd as $s ) : ?>
				var k = 1;
				$('#tambah<?= $s['sppd_id'] ?>').click(function(){
					k++;
					$('#wadah<?= $s['sppd_id'] ?>').append('<tr id="row'+k+'"><td style="width: 80%"><select class="form-control"  name="tim[]"><?php foreach($pegawai as $p ) : ?><option value="<?= $p['pegawai_nip'] ?>"><?= $p['pegawai_nip'].' - '.$p['pegawai_nama'] ?></option><?php endforeach ?></select></td><td style="text-align: center"><button name="hapus" id="'+k+'" class="btn btn-danger btn_remove">X</button></td></tr>');
				});
				$(document).on('click', '.btn_remove<?= $s['sppd_id'] ?>', function(){
					var button_id = $(this).attr("id");
					$('#row'+button_id+'').remove();
				});
			<?php endforeach ?>
		});
	</script>

	<script>
		$(document).ready(function() {
			var r= <?= count($rincian) ?>;
			$('#tambah').click(function() {
				r++;
				$('#wadah').append('<tr id="row'+r+'"><td><input name="perincian_biaya[]" required="" style="width: 90%;" type="text" class="form-control"></td><td><input name="jumlah_satuan[]" required="" style="width: 90%;" type="number" class="form-control"></td><td><input name="nilai_satuan[]" required="" style="width: 90%;" type="number" class="form-control"></td><td><input name="keterangan[]" style="width: 90%;" type="text" class="form-control"></td><td><button type="button" name="hapus" id="'+r+'" class="btn btn-danger btn_remove">X</button></td></tr>');
			});
			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});
		});
	</script>

<script>
		$(document).ready(function() {
			var b= 1;
			$('#tambah_badan').click(function() {
				b++;
				$('#wadah_badan').append('<tr id="row'+b+'"><td><select class="form-control"  name="masuk_badan[]" required=""><option value="">-Pilih badan-</option><?php foreach($badan as $b ) : ?><option value="<?= $b['badan_nama'] ?>"><?= $b['badan_nama'] ?></option><?php endforeach ?></select></td><td><select class="form-control"  name="masuk_jabatan[]" required=""><option value="">-Pilih jabatan-</option><?php foreach($jabatan_badan as $j ) : ?><option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option><?php endforeach ?></select></td><td><button type="button" name="hapus" id="'+b+'" class="btn btn-danger btn_remove">X</button></td></tr>');
			});
			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});
		});
	</script>


<script>
		$(document).ready(function(){
			<?php foreach($anggota as $a ) : ?>
				var bb = <?= count($badan) ?>;
				$('#tambah_badan_edit<?= $a['anggota_id'] ?>').click(function(){
					bb++;
					$('#wadah_badan_edit<?= $a['anggota_id'] ?>').append('<tr id="row_edit<?= $a['anggota_id'] ?>'+bb+'"><td><select class="form-control"  name="masuk_badan[]" required=""><option value="">-Pilih badan-</option><?php foreach($badan as $b ) : ?><option value="<?= $b['badan_nama'] ?>"><?= $b['badan_nama'] ?></option><?php endforeach ?></select></td><td><select class="form-control"  name="masuk_jabatan[]" required=""><option value="">-Pilih jabatan-</option><?php foreach($jabatan_badan as $j ) : ?><option value="<?= $j['jabatan_nama'] ?>"><?= $j['jabatan_nama'] ?></option><?php endforeach ?></select></td><td><button type="button" name="hapus" id="'+bb+'" class="btn btn-danger btn_remove_edit<?= $a['anggota_id'] ?>">X</button></td></tr>');
				});
				$(document).on('click', '.btn_remove_edit<?= $a['anggota_id'] ?>', function(){
					var button_id = $(this).attr("id");
					$('#row_edit<?= $a['anggota_id'] ?>'+button_id+'').remove();
				});
			<?php endforeach ?>
		});
	</script>
<script>
    $(document).ready(function() {
        $('#peserta').on('change', function() {
            var komisi = $(this).val();
			if(komisi == '') {
				$('#daftar').css('display','none');
				$('#daftar_pimpinan').css('display','none');
			}else{
				$('#daftar').css('display','block');
				$('#daftar_pimpinan').css('display','block');
				if (komisi != 'Komisi X' ) {
					$.ajax({
					url:"<?= base_url() ?>Sppd/pilih_anggota",
					type:"POST",
					data:{'komisi' : komisi},
					dataType: 'json',
					success: function(data) {
						$('#data').html(data);
					},
					error: function() {
						$('#data').html(data);
					}
				});
				}
			}
        });
    });
</script>
<script>
	$('.tot').on('input', function() {
		var total = 0;
		$('.tot').each(function() {
			var input = $(this).val();
			if($.isNumeric(input)){
				total += parseFloat(input); 
			}
		});
		$('#total').val(total);
	});
</script>

</body>
</html>