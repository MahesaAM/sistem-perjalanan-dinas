
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
<script>
		$(document).ready(function(){
		
		var l = 0;
		$('#tambah_laporan').click(function(){
			l++;
			$('#wadah_laporan').append('<tr id="row_laporan'+l+'"><td><input type="file" class="form-control" name="laporan[]" required=""></td><td><textarea name="nama_laporan[]" required="" cols="20" rows="2" required=""></textarea></td><td style="text-align: center"><button name="hapus" id="'+l+'" class="btn btn-danger btn_remove_laporan">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove_laporan', function(){
			var button_id = $(this).attr("id");
			$('#row_laporan'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		
		var le = <?= count($laporan)-1 ?>;
		$('#tambah_laporan_edit').click(function(){
			le++;
			$('#wadah_laporan_edit').append('<tr id="row_laporan'+le+'"><td><input type="file" class="form-control" name="laporan[]" required=""></td><td><textarea name="nama_laporan[]" required="" cols="20" rows="2" required=""></textarea></td><td style="text-align: center"><button type="button" name="hapus" id="'+le+'" class="btn btn-danger btn_remove_laporan">X</button></td></tr>');
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
			$('#wadah_documentasi').append('<tr id="row_documentasi'+d+'"><td><input type="file" class="form-control" name="documentasi[]" id="file-ip-1" accept="image/*" onchange="showPreview(event,'+d+');" required=""></td><td><textarea name="nama_documentasi[]" cols="20" rows="2" required=""></textarea></td><td style="text-align: center"><button type="button" name="hapus" id="'+d+'" class="btn btn-danger btn_remove_documentasi">X</button></td></tr><tr id="row_p_documentasi'+d+'"><td colspan="2"><img style="width:300px;" id="file-ip-1-preview'+d+'"></td></tr>');
		});
		$(document).on('click', '.btn_remove_documentasi', function(){
			var button_id = $(this).attr("id");
			$('#row_documentasi'+button_id+'').remove();
			$('#row_p_documentasi'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
		$(document).ready(function(){
		var ddd = <?= count($documentasi)-1 ?>;
		$('#tambah_documentasi_edit').click(function(){
			ddd++;
			$('#wadah_documentasi_edit').append('<tr id="row_documentasi_edit'+ddd+'"><td><input type="file" class="form-control" name="documentasi[]" id="file-ip-1" accept="image/*" onchange="showPreview(event,'+ddd+');" required=""></td><td><textarea name="nama_documentasi[]" cols="20" rows="2" required=""></textarea></td><td style="text-align: center"><button type="button" name="hapus" id="'+ddd+'" class="btn btn-danger btn_remove_documentasi_edit">X</button></td></tr><tr id="row_p_documentasi_edit'+ddd+'"><td colspan="2"><img style="width:300px;" id="file-ip-1-preview'+ddd+'"></td></tr>');
		});
		$(document).on('click', '.btn_remove_documentasi_edit', function(){
			var button_id = $(this).attr("id");
			$('#row_documentasi_edit'+button_id+'').remove();
			$('#row_p_documentasi_edit'+button_id+'').remove();
		});
		
		});
	</script>
	<script>
			function showPreview(event,dd){
			if(event.target.files.length > 0){
			var src = URL.createObjectURL(event.target.files[0]);
			var preview = document.getElementById("file-ip-1-preview"+dd);
			preview.src = src;
			preview.style.display = "block";
			}
		}
	</script>
	<script>

// //indirect ajax
// //file collection array
// var fileCollection = new Array();

// $('#images').on('change',function(e){

// 	var files = e.target.files;
// 	var i = 0;
// 	$.each(files, function(i, file){
// 		i = Math.floor(Math.random()*1000);
// 		fileCollection.push(file);

// 		var reader = new FileReader();
// 		reader.readAsDataURL(file);
// 		reader.onload = function(e){	

// 			var template = '<tr id="row_documentasi'+i+'"><td><img style="width:100px;" src="'+e.target.result+'"><input type="hidden" value="1000" name="nama_file_documentasi[]"></td> '+
// 				'<td><textarea name="nama_documentasi[]" cols="40" rows="4"></textarea></td>'+
// 				'<td><button name="hapus" id="'+i+'" class="btn btn-danger btn_remove_documentasi">X</button></td></tr>';

// 			$('#images-to-upload').append(template);
// 		};
// 	});
// });
// $(document).on('click', '.btn_remove_documentasi', function(){
// 			var button_id = $(this).attr("id");
// 			$('#row_documentasi'+button_id+'').remove();
// 		});
</script>
</body>
</html>