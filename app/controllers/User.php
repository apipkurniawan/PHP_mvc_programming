<?php 

// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class User extends Controller {
	
	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar User'; // untuk memberi judul
		$data['use'] = $this->model('User_model')->getAllUser();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {
		
		$data['judul'] = 'Detail User'; // untuk memberi judul
		$data['use'] = $this->model('User_model')->getUserById($id);
		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('user/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('User_model')->tambahDataUser($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/user'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/user');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('User_model')->hapusDataUser($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/user');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/user');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('User_model')->getUserById($_POST['id']));
	}
	
	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('User_model')->ubahDataUser($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/user');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/user');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar User'; // untuk memberi judul
		$data['use'] = $this->model('User_model')->cariDataUser();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}
}





