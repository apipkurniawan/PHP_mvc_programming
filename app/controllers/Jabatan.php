<?php 

// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class Jabatan extends Controller {
	
	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar Jabatan'; // untuk memberi judul
		$data['jab'] = $this->model('Jabatan_model')->getAllJabatan();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('jabatan/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {
		
		$data['judul'] = 'Detail Jabatan'; // untuk memberi judul
		$data['jab'] = $this->model('Jabatan_model')->getJabatanById($id);
		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('jabatan/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('Jabatan_model')->tambahDataJabatan($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/jabatan'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/jabatan');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('Jabatan_model')->hapusDataJabatan($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/jabatan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/jabatan');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Jabatan_model')->getJabatanById($_POST['id']));
	}
	public function tampilTunjanganJabatan()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Jabatan_model')->getJabatanById($_POST['id']));
	}

	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('Jabatan_model')->ubahDataJabatan($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/jabatan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/jabatan');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar Jabatan'; // untuk memberi judul
		$data['jab'] = $this->model('Jabatan_model')->cariDataJabatan();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('jabatan/index', $data);
		$this->view('templates/footer');
	}
}





