  function hitungGajiKaryawan(){
    var gaPok = document.getElementById('gajiPok').value;
    var uaTra = document.getElementById('uangTra').value;
    var tunGol = document.getElementById('tunjanganGol').value;
    var uaMak = document.getElementById('uangMak').value;
    var tunJab = document.getElementById('tunjanganJab').value;
    var uaLem = document.getElementById('uangLem').value;
    var tunKel = document.getElementById('tunjanganKel').value;
    var uaLai = document.getElementById('uangLai').value;
    var tunAna = document.getElementById('tunjanganAna').value;
    var totPen = parseInt(gaPok)+parseInt(uaLai)+parseInt(uaLem)+parseInt(uaTra)+parseInt(uaMak)+parseInt(tunAna)+parseInt(tunKel)+parseInt(tunJab)+parseInt(tunGol);
    $('#totalPen').val(totPen);
    var pph = (parseInt(totPen)*10) / 100;
    $('#pph').val(pph);
    var bpjs = (parseInt(totPen)*1) / 100;
    $('#bpjs').val(bpjs);
    
    var simWaj = document.getElementById('simpananWaj').value;
    var pinKop = document.getElementById('pinjamanKop').value;
    var potLai = document.getElementById('potonganLai').value;
    var totPot = parseInt(simWaj)+parseInt(potLai)+parseInt(pinKop)+parseInt(pph)+parseInt(bpjs);
    $('#totalPot').val(totPot);

    var gaBer = parseInt(totPen)-parseInt(totPot);    
    $('#gajiBer').val(gaBer);
}

$(function() {
	// awal function karyawan
	$('.tombolTambahDataKaryawan').on('click', function() {
		$('#formModalLabel').html('Tambah Data Karyawan');
		$('.modal-footer button[type=submit]').html('Tambah Data');		
		// mengkosongkan value
		$('#namaKar').val(''); 
		$('#gajiPok').val('');
		$('#idGol').val('');
		$('#idJab').val('');
		$('#divisi').val('');
		$('#statusPer').val('Belum Menikah');
		$('#jumlahAna').val('0');
		// $('#idKar').val('');		
	});	

	$('.tampilModalUbahKaryawan').on('click', function() { // jika tombol ubah di klik jalankan fungsi berikut
		$('#formModalLabel').html('Ubah Data Karyawan'); // ubah html pada id formModalLabel menjadi ubah data mahasiswa
		$('.modal-footer button[type=submit]').html('Ubah Data'); // ubah html pada class modal-footer pada button dengan type submit
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/karyawan/ubah'); // ubah action nya pada class modal-body

		const id = $(this).data('id');
		// menjalankan sebuah ajax
		$.ajax({
			url:'http://localhost/phpmvc/public/karyawan/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// menampilkan value
				$('#namaKar').val(data.nama_karyawan); 
				$('#gajiPok').val(data.gaji_pokok);
				$('#idGol').val(data.id_golongan);
				$('#idJab').val(data.id_jabatan);
				$('#divisi').val(data.divisi);
				$('#statusPer').val(data.status_pernikahan);
				$('#jumlahAna').val(data.jumlah_anak);
				$('#idKar').val(data.id_karyawan);
			}
		});
	});
	// akhir function karyawan


	// awal function jabatan
	$('.tombolTambahDataJabatan').on('click', function() {
		$('#formModalLabel').html('Tambah Data Jabatan');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		// mengkosongkan value
		$('#namaJab').val(''); 
		$('#tunjanganJab').val('');
		$('#tunjanganKel').val('');
		$('#tunjanganAna').val('');
		// $('#idJab').val('');
	});	
	
	$('.tampilModalUbahJabatan').on('click', function() { // jika tombol ubah di klik jalankan fungsi berikut
		$('#formModalLabel').html('Ubah Data Jabatan'); // ubah html pada id formModalLabel menjadi ubah data mahasiswa
		$('.modal-footer button[type=submit]').html('Ubah Data'); // ubah html pada class modal-footer pada button dengan type submit
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/jabatan/ubah'); // ubah action nya pada class modal-body

		const id = $(this).data('id');
		// menjalankan sebuah ajax
		$.ajax({
			url:'http://localhost/phpmvc/public/jabatan/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// menampilkan value
				$('#namaJab').val(data.nama_jabatan); 
				$('#tunjanganJab').val(data.tunjangan_jabatan);
				$('#tunjanganKel').val(data.tunjangan_keluarga);
				$('#tunjanganAna').val(data.tunjangan_anak);
				$('#idJab').val(data.id_jabatan);
			}
		});
	});
	// akhir function jabatan


	// awal function Golongan
	$('.tombolTambahDataGolongan').on('click', function() {
		$('#formModalLabel').html('Tambah Data Golongan');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		// mengkosongkan value
		$('#namaGol').val(''); 
		$('#tunjanganGol').val('');
		// $('#idGol').val('');
	});	
	
	$('.tampilModalUbahGolongan').on('click', function() { // jika tombol ubah di klik jalankan fungsi berikut
		$('#formModalLabel').html('Ubah Data Golongan'); // ubah html pada id formModalLabel menjadi ubah data mahasiswa
		$('.modal-footer button[type=submit]').html('Ubah Data'); // ubah html pada class modal-footer pada button dengan type submit
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/golongan/ubah'); // ubah action nya pada class modal-body

		const id = $(this).data('id');
		// menjalankan sebuah ajax
		$.ajax({
			url:'http://localhost/phpmvc/public/golongan/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// menampilkan value
				$('#namaGol').val(data.nama_golongan); 
				$('#tunjanganGol').val(data.tunjangan_golongan);
				$('#idGol').val(data.id_golongan);
			}
		});
	});
	// akhir function Golongan

	// awal function Profil
	$('.tombolTambahDataProfil').on('click', function() {
		$('#formModalLabel').html('Tambah Data Profil');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		// mengkosongkan value
		$('#namaPer').val(''); 
		$('#alamat').val(''); 
		$('#telp').val(''); 
		$('#fax').val(''); 
		$('#email').val(''); 
		$('#website').val(''); 
		// $('#idPro').val('');
	});	
	
	$('.tampilModalUbahProfil').on('click', function() { // jika tombol ubah di klik jalankan fungsi berikut
		$('#formModalLabel').html('Ubah Data Profil'); // ubah html pada id formModalLabel menjadi ubah data mahasiswa
		$('.modal-footer button[type=submit]').html('Ubah Data'); // ubah html pada class modal-footer pada button dengan type submit
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/profil/ubah'); // ubah action nya pada class modal-body

		const id = $(this).data('id');
		// menjalankan sebuah ajax
		$.ajax({
			url:'http://localhost/phpmvc/public/profil/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// menampilkan value
				$('#namaPer').val(data.nama_perusahaan); 
				$('#alamat').val(data.alamat); 
				$('#telp').val(data.telp); 
				$('#fax').val(data.fax); 
				$('#email').val(data.email); 
				$('#website').val(data.website); 
				$('#idPro').val(data.id_profil);
			}
		});
	});
	// akhir function Profil


	// awal function gaji
	$('.tombolTambahDataGaji').on('click', function() {
		// mengkosongkan value
		$('#idKar').val(''); 
		$('#gajiPok').val(''); 
		$('#tunjanganGol').val(''); 
		$('#tunjanganJab').val(''); 
		$('#tunjanganKel').val(''); 
		$('#tunjanganAna').val('');
		$('#uangTra').val('0');
		$('#uangMak').val('0');
		$('#uangLem').val('0');
		$('#uangLai').val('0');
		$('#totalPen').val('');
		$('#pph').val('');
		$('#bpjs').val('');
		$('#simpananWaj').val('0');
		$('#pinjamanKop').val('0');
		$('#potonganLai').val('0');
		$('#totalPot').val('');
		$('#gajiBer').val('');
		$('#keterangan').val('Ok');		
	});		
	// akhir function gaji


	// awal function User
	$('.tombolTambahDataUser').on('click', function() {
		$('#formModalLabel').html('Tambah Data User');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		// mengkosongkan value
		$('#namaUse').val(''); 
		$('#statusUse').val(''); 
		$('#passwordUse').val(''); 
		$('#idUse').val('');
	});	

	$('.tampilModalUbahUser').on('click', function() { // jika tombol ubah di klik jalankan fungsi berikut
		$('#formModalLabel').html('Ubah Data User'); // ubah html pada id formModalLabel menjadi ubah data mahasiswa
		$('.modal-footer button[type=submit]').html('Ubah Data'); // ubah html pada class modal-footer pada button dengan type submit
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/user/ubah'); // ubah action nya pada class modal-body
		const id = $(this).data('id');
		// menjalankan sebuah ajax
		$.ajax({
			url:'http://localhost/phpmvc/public/user/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// menampilkan value
				$('#namaUse').val(data.nama_user); 
				$('#statusUse').val(data.status_user); 
				$('#passwordUse').val(data.password_user); 
				$('#idUse').val(data.id_user);
			}
		});
	});
	// akhir function User
});