<?php 

// class about ini akan extend terhadap
 // class controller yang ada di folder core / child class
class About extends Controller{

	// ini adalah method
	public function index($nama = 'apip', $pekerjaan = 'programmer')
	{
		// array di url
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;
		$data['judul'] = 'About Me'; // untuk memberi judul

		// memanggil view
 		$this->view('templates/header', $data);
 		// memanggil ke folder views - ke about - lalu ke file yg namanya index
 		$this->view('about/index', $data); 
 		$this->view('templates/footer');
	}


	// ini adalah method
	public function page()
	{
		$data['judul'] = 'Pages'; // untuk memberi judul
		// memanggil view
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}
