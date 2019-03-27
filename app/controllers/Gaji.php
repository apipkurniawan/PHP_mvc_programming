<?php 
// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class Gaji extends Controller {

	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar Gaji'; // untuk memberi judul
		$data['gaj'] = $this->model('Gaji_model')->getAllGaji();
		$data['kar'] = $this->model('Karyawan_model')->getAllKaryawan();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('gaji/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {	
		$data['judul'] = 'Detail Gaji'; // untuk memberi judul
		$data['gaj'] = $this->model('Gaji_model')->getGajiById($id);		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('gaji/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('Gaji_model')->tambahDataGaji($_POST) > 0 && $this->model('Gaji_model')->tambahDataDetailPotongan($_POST) > 0 && $this->model('Gaji_model')->tambahDataDetailPendapatan($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/gaji'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/gaji');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('Gaji_model')->hapusDataGaji($id) > 0 && $this->model('Gaji_model')->hapusDataDetailPotongan($id) > 0 && $this->model('Gaji_model')->hapusDataDetailPendapatan($id) > 0) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/gaji');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/gaji');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Gaji_model')->getGajiById($_POST['id']));
	}

	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('Gaji_model')->ubahDataGaji($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/gaji');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/gaji');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar Gaji'; // untuk memberi judul
		$data['gaj'] = $this->model('Gaji_model')->cariDataGaji();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('gaji/index', $data);
		$this->view('templates/footer');
	}

	public function tampilGaji()
	{
		echo json_encode($this->model('Gaji_model')->getTampilGajiPokokById($_POST['id']));
	}
}





