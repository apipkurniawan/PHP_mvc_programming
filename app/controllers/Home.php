<?php 

// class home ini akan extend terhadap class controller yang ada di folder core / child class
class Home extends Controller {
	
	// ini adalah method nya
	public function index()
	{	
		$data['judul'] = 'Home'; // untuk memberi judul
		// $data['nama'] = $this->model('User_model')->getUser(); // untuk mengirim data ke home

		// memanggil view
		$this->view('templates/header', $data); // memanggil ke folder views - ke templates - lalu ke file yg namanya header
		$this->view('home/index', $data); // memanggil ke folder views - ke home - lalu ke file yg namanya index
		$this->view('templates/footer');
	}
}