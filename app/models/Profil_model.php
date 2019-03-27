<?php 

class Profil_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'profil';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllProfil()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getProfilById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_profil=:id_profil ');
		$this->db->bind('id_profil', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataProfil($data)
	{
		$query = "INSERT INTO profil VALUES ('', :nama_perusahaan, :alamat, :telp, :fax, :email, :website)";
		$this->db->query($query); // jalankan query
		$this->db->bind('nama_perusahaan', $data['namaPer']); 
		$this->db->bind('alamat', $data['alamat']); 
		$this->db->bind('telp', $data['telp']); 
		$this->db->bind('fax', $data['fax']); 
		$this->db->bind('email', $data['email']); 
		$this->db->bind('website', $data['website']); 
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataProfil($id)
	{
		$query = "DELETE FROM profil WHERE id_profil = :id_profil";
		$this->db->query($query);
		$this->db->bind('id_profil', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mengubah data
	public function ubahDataProfil($data)
	{
		$query = "UPDATE profil SET 
					nama_perusahaan = :namaPer,
					alamat = :alamat,
					telp = :telp,
					fax = :fax,
					email = :email,
					website = :website
					WHERE id_profil = :idPro";

		$this->db->query($query);
		$this->db->bind('namaPer', $data['namaPer']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('telp', $data['telp']);
		$this->db->bind('fax', $data['fax']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('website', $data['website']);
		$this->db->bind('idPro', $data['idPro']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataProfil()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM profil WHERE nama_perusahaan LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}



