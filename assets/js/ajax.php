<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilBagian();
		tampilKK();
		tampilPengguna();
		tampilPosisi();
		tampilPA();
		tampilPR();
		tampilProvinsi();
		tampilSE();
		tampilTahap();
		tampilTG();
		tampilTK();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}


//Bagian ===============================================================================================================================================================================================================================
	function tampilBagian() {
		$.get('<?php echo base_url('Bagian/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-bagian').html(data);
			refresh();
		});
	}

	var id_bagian;
	$(document).on("click", ".konfirmasiHapus-bagian", function() {
		id_bagian = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBagian", function() {
		var id = id_bagian;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bagian/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBagian();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBagian", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bagian/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-bagian').modal('show');
		})
	})

	$(document).on("click", ".detail-dataBagian", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bagian/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-bagian').modal('show');
		})
	})

	$('#form-tambah-bagian').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Bagian/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBagian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-bagian").reset();
				$('#tambah-bagian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-bagian', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Bagian/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBagian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-bagian").reset();
				$('#update-bagian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-bagian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-bagian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



//Pengguna ======================================================================================================================================================================================================================================
	function tampilPengguna() {
		$.get('<?php echo base_url('Pengguna/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pengguna').html(data);
			refresh();
		});
	}

	var id_pengguna;
	$(document).on("click", ".konfirmasiHapus-pengguna", function() {
		id_pengguna = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPengguna", function() {
		var id = id_pengguna;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengguna/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPengguna();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPengguna", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengguna/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pengguna').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPengguna", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengguna/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-pengguna').modal('show');
		})
	})
	
	$('#form-tambah-pengguna').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengguna/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPengguna();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pengguna").reset();
				$('#tambah-pengguna').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pengguna', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengguna/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPengguna();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pengguna").reset();
				$('#update-pengguna').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pengguna').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pengguna').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	
	//Posisi  ==============================================================================================================================================================================================================================
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Provinsi   ===============================================================================================================================================================================================================================
	function tampilProvinsi() {
		$.get('<?php echo base_url('Provinsi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-provinsi').html(data);
			refresh();
		});
	}

	var id_provinsi;
	$(document).on("click", ".konfirmasiHapus-provinsi", function() {
		id_provinsi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProvinsi", function() {
		var id = id_provinsi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Provinsi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProvinsi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProvinsi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Provinsi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-provinsi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataProvinsi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Provinsi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-provinsi').modal('show');
		})
	})

	$('#form-tambah-provinsi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Provinsi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-provinsi").reset();
				$('#tambah-provinsi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-provinsi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Provinsi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProvinsi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-provinsi").reset();
				$('#update-provinsi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-provinsi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-provinsi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



	//Tahap ================================================================================================================================================================================================================================
	function tampilTahap() {
		$.get('<?php echo base_url('Tahap/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-tahap').html(data);
			refresh();
		});
	}

	var id_tahap;
	$(document).on("click", ".konfirmasiHapus-tahap", function() {
		id_tahap = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTahap", function() {
		var id = id_tahap;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tahap/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTahap();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTahap", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tahap/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-tahap').modal('show');
		})
	})

	$(document).on("click", ".detail-dataTahap", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Tahap/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-tahap').modal('show');
		})
	})

	$('#form-tambah-tahap').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Tahap/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTahap();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-tahap").reset();
				$('#tambah-tahap').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-tahap', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Tahap/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTahap();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-tahap").reset();
				$('#update-tahap').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-tahap').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-tahap').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Kuisioner Sistem Elektronik ===============================================================================================================================================================================================================================
	function tampilSE() {
		$.get('<?php echo base_url('SE/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-SE').html(data);
			refresh();
		});
	}

	var id_SE;
	$(document).on("click", ".konfirmasiHapus-SE", function() {
		id_SE = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSE", function() {
		var id = id_SE;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('SE/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSE();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSE", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('SE/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-SE').modal('show');
		})
	})

	$('#form-tambah-SE').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('SE/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSE();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-SE").reset();
				$('#tambah-SE').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-SE', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('SE/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSE();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-SE").reset();
				$('#update-SE').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-SE').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-SE').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Kuisioner Tata Kelola Keamanan Informasi ===============================================================================================================================================================================================================================
	function tampilTK() {
		$.get('<?php echo base_url('TK/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-TK').html(data);
			refresh();
		});
	}

	var id_TK;
	$(document).on("click", ".konfirmasiHapus-TK", function() {
		id_TK = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTK", function() {
		var id = id_TK;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('TK/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTK();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTK", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('TK/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-TK').modal('show');
		})
	})

	$('#form-tambah-TK').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('TK/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTK();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-TK").reset();
				$('#tambah-TK').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-TK', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('TK/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTK();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-TK").reset();
				$('#update-TK').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-TK').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-TK').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	

//Kuisioner Pengelolaan Risiko Keamanan Informasi ===============================================================================================================================================================================================================================
	
	function tampilPR() {
		$.get('<?php echo base_url('PR/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-PR').html(data);
			refresh();
		});
	}

	var id_PR;
	$(document).on("click", ".konfirmasiHapus-PR", function() {
		id_PR = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPR", function() {
		var id = id_PR;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('PR/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPR();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPR", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('PR/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-PR').modal('show');
		})
	})

	$('#form-tambah-PR').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('PR/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPR();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-PR").reset();
				$('#tambah-PR').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-PR', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('PR/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPR();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-PR").reset();
				$('#update-PR').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-PR').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-PR').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Kuisioner Kerangka Kerja Keamanan Informasi ===============================================================================================================================================================================================================================
	
	function tampilKK() {
		$.get('<?php echo base_url('KK/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-KK').html(data);
			refresh();
		});
	}

	var id_KK;
	$(document).on("click", ".konfirmasiHapus-KK", function() {
		id_KK = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKK", function() {
		var id = id_KK;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('KK/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKK();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKK", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('KK/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-KK').modal('show');
		})
	})

	$('#form-tambah-KK').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('KK/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKK();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-KK").reset();
				$('#tambah-KK').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-KK', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('KK/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKK();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-KK").reset();
				$('#update-KK').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-KK').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-KK').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})




//Kuisioner Pengelolaan Aset Informasi ===============================================================================================================================================================================================================================
	
	function tampilPA() {
		$.get('<?php echo base_url('PA/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-PA').html(data);
			refresh();
		});
	}

	var id_PA;
	$(document).on("click", ".konfirmasiHapus-PA", function() {
		id_PA = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPA", function() {
		var id = id_PA;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('PA/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPA();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPA", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('PA/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-PA').modal('show');
		})
	})

	$('#form-tambah-PA').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('PA/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPA();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-PA").reset();
				$('#tambah-PA').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-PA', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('PA/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPA();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-PA").reset();
				$('#update-PA').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-PA').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-PA').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Kuisioner Pengelolaan Teknologi dan Keamanan Informasi ===============================================================================================================================================================================================================================
	
	function tampilTG() {
		$.get('<?php echo base_url('TG/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-TG').html(data);
			refresh();
		});
	}

	var id_TG;
	$(document).on("click", ".konfirmasiHapus-TG", function() {
		id_TG = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTG", function() {
		var id = id_TG;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('TG/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTG();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTG", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('TG/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-TG').modal('show');
		})
	})

	$('#form-tambah-TG').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('TG/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTG();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-TG").reset();
				$('#tambah-TG').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-TG', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('TG/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTG();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-TG").reset();
				$('#update-TG').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-TG').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-TG').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
</script>