<?php 

// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class Golongan extends Controller {
	
	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar Golongan'; // untuk memberi judul
		$data['gol'] = $this->model('Golongan_model')->getAllGolongan();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('golongan/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {
		
		$data['judul'] = 'Detail Golongan'; // untuk memberi judul
		$data['gol'] = $this->model('Golongan_model')->getGolonganById($id);
		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('golongan/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('Golongan_model')->tambahDataGolongan($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/golongan'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/golongan');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('Golongan_model')->hapusDataGolongan($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/golongan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/golongan');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Golongan_model')->getGolonganById($_POST['id']));
	}

	public function tampilTunjanganGolongan()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Golongan_model')->getGolonganById($_POST['id']));
	}

	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('Golongan_model')->ubahDataGolongan($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/golongan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/golongan');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar Golongan'; // untuk memberi judul
		$data['gol'] = $this->model('Golongan_model')->cariDataGolongan();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('golongan/index', $data);
		$this->view('templates/footer');
	}
}





