<?php 

// ini adalah class
class User_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'user';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllUser()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user=:id_user ');
		$this->db->bind('id_user', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataUser($data)
	{
		$query = "INSERT INTO user VALUES ('', :nama_user, :status_user, :password_user)";
		$this->db->query($query); // jalankan query
		$this->db->bind('nama_user', $data['namaUse']); 
		$this->db->bind('status_user', $data['statusUse']);
		$this->db->bind('password_user', $data['passwordUse']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataUser($id)
	{
		$query = "DELETE FROM user WHERE id_user = :id_user";
		$this->db->query($query);
		$this->db->bind('id_user', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mengubah data
	public function ubahDataUser($data)
	{
		$query = "UPDATE user SET 
					nama_user = :namaUse,
					status_user = :statusUse,
					password_user = :passwordUse
					WHERE id_user = :idUse";

		$this->db->query($query);
		$this->db->bind('namaUse', $data['namaUse']);
		$this->db->bind('statusUse', $data['statusUse']);
		$this->db->bind('passwordUse', $data['passwordUse']);
		$this->db->bind('idUse', $data['idUse']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataUser()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM user WHERE nama_user LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}