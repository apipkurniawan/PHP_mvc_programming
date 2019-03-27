<?php 

// ini merupakan class utama
class App {

	protected $controller = 'Home'; // ini adalah defaultnya
	protected $method = 'index'; // ini adalah defaultnya
	protected $params = [];


	public function __construct()
	{
		$url = $this->parseURL(); // pemanggilan method parsing url 
		

		// controller
		if (file_exists('../app/controllers/' . $url[0] . '.php')) // cara baca : ada ga file home.php didalam folder controllers.?
		{
			$this->controller = $url[0]; // kalo ada timpa dengan controller yang baru
			unset($url[0]); // hilangkan controller nya dari array nya
		}


		// memanggil controller
		require_once '../app/controllers/' . $this->controller . '.php';
		// instansiasi controller nya
		$this->controller = new $this->controller;


		// method
		if (isset($url[1])) { // [1] artinya kalau ada 
			if (method_exists($this->controller, $url[1])) // cek apakah methodnya ada didalam controller nya
			{
				$this->method = $url[1]; // kalo ada timpa dengan method baru
				unset($url[1]); // hilangkan methodnya
			}	
		}


		// params
		if (!empty($url)) { // jika tidak ada urlnya
			$this->params = array_values($url); // masukan value dari array nya ke dalam param
		}


		// jalankan controller dan method , serta kirimkan params jika ada 
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	// method untuk melakukan proses parsing dari url yaitu mengambil url dan memecah sesuai keinginan kita
	public function parseURL()
	{
		if (isset($_GET['url'])) { // cara baca : jika ada url yang dikirimkan
			$url = rtrim($_GET['url'], '/'); // untuk membersihkan url dari tanda slash
			$url = filter_var($url, FILTER_SANITIZE_URL); // untuk membersihkan url dari karakter-karakter yang ngaco
			$url = explode ('/', $url); // untuk memecah url berdasarkan tanda slash
			return $url;
		}
	}
}

// .htaccess adalah sebuah teknik/file untuk memodifikasi konfigurasi dari server apache kita dan bisa dilakukan per folder.

// Options -Indexes
// cara baca : kalo misalkan ada user yang membuka folder App dan folder-folder didalamnya dan selama didalam folder itu tidak ada file index maka jangan tampilkan isi foldernya atau block akses nya.

// Options -Multiviews 
// RewriteEngine On
// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteRule ^(.*)$ index.php?url=$1 [L]
// tujuan : untuk menghindari kesalahan atau ambigu ketika kita memanggil folder atau file dalam public ini

// localhost/phpmvc/public/about/page/satu
// about = controller
// page = method
// satu = parameter