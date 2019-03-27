<?php 

// class mahasiswa ini akan extend terhadap class controller yang ada di folder core / child class
class Karyawan extends Controller {
	
	// ini adalah method defaultnya
	public function index() {
		
		$data['judul'] = 'Daftar Karyawan'; // untuk memberi judul
		$data['kar'] = $this->model('Karyawan_model')->getAllKaryawan();
		$data['gol'] = $this->model('Golongan_model')->getAllGolongan();
		$data['jab'] = $this->model('Jabatan_model')->getAllJabatan();

		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('karyawan/index', $data);
		$this->view('templates/footer');
	}

	// ini adalah method melihat detail data
	public function detail($id) {	
		$data['judul'] = 'Detail Karyawan'; // untuk memberi judul
		$data['kar'] = $this->model('Karyawan_model')->getKaryawanById($id);		
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('karyawan/detail', $data); // memanggil ke folder views - ke mahasiswa - lalu ke file yg namanya detail
		$this->view('templates/footer');
	}

	// ini adalah method untuk tambah data
	public function tambah() 
	{
		if ( $this->model('Karyawan_model')->tambahDataKaryawan($_POST) > 0 ) { // tambahDataMahasiswa adalah method yang ada pada Mahasiswa_model.php dalam folder models 
			Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // 'berhasil = $pesan' 'ditambahkan = $aksi' 'success = $tipe'
			header('Location: ' . BASEURL . '/karyawan'); // setelah data berhasil ditambahkan maka akan diarahkan ke tampilan views mahasiswa
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}
	}

	// ini adalah method untuk hapus data
	public function hapus($id) 
	{
		if ( $this->model('Karyawan_model')->hapusDataKaryawan($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}
	}

	// ini adalah method untuk ubah data
	public function getubah()
	{
		// echo $_POST['id'];
		echo json_encode($this->model('Karyawan_model')->getKaryawanById($_POST['id']));
	}

	// ini adalah method untuk ubah data
	public function ubah()
	{
		if ( $this->model('Karyawan_model')->ubahDataKaryawan($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'diubah', 'success');
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diubah', 'danger');
			header('Location: ' . BASEURL . '/karyawan');
			exit;
		}	
	}

	// ini adalah method untuk cari data
	public function cari()
	{
		$data['judul'] = 'Daftar Mahasiswa'; // untuk memberi judul
		$data['kar'] = $this->model('Karyawan_model')->cariDataKaryawan();
		// memanggil view 
		$this->view('templates/header', $data);
		$this->view('karyawan/index', $data);
		$this->view('templates/footer');
	}
}





