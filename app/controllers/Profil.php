<?php 

// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class Profil extends Controller {
	
	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar Profil'; // untuk memberi judul
		$data['pro'] = $this->model('Profil_model')->getAllProfil();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('profil/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {
		
		$data['judul'] = 'Detail Profil'; // untuk memberi judul
		$data['pro'] = $this->model('Profil_model')->getProfilById($id);
		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('profil/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('Profil_model')->tambahDataProfil($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/profil'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/profil');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('Profil_model')->hapusDataProfil($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/profil');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/profil');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Profil_model')->getProfilById($_POST['id']));
	}

	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('Profil_model')->ubahDataProfil($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/profil');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/profil');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar Profil'; // untuk memberi judul
		$data['pro'] = $this->model('Profil_model')->cariDataProfil();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('profil/index', $data);
		$this->view('templates/footer');
	}
}





