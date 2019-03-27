<?php 

class Golongan_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'golongan';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllGolongan()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getGolonganById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_golongan=:id_golongan ');
		$this->db->bind('id_golongan', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataGolongan($data)
	{
		$query = "INSERT INTO golongan VALUES (:id_golongan, :nama_golongan, :tunjangan_golongan)";
		$this->db->query($query); // jalankan query
		$this->db->bind('id_golongan', $data['idGol']); 
		$this->db->bind('nama_golongan', $data['namaGol']); 
		$this->db->bind('tunjangan_golongan', $data['tunjanganGol']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataGolongan($id)
	{
		$query = "DELETE FROM golongan WHERE id_golongan = :id_golongan";
		$this->db->query($query);
		$this->db->bind('id_golongan', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mengubah data
	public function ubahDataGolongan($data)
	{
		$query = "UPDATE golongan SET 
					nama_golongan = :namaGol,
					tunjangan_golongan = :tunjanganGol
					WHERE id_golongan = :idGol";

		$this->db->query($query);
		$this->db->bind('namaGol', $data['namaGol']);
		$this->db->bind('tunjanganGol', $data['tunjanganGol']);
		$this->db->bind('idGol', $data['idGol']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataGolongan()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM golongan WHERE nama_golongan LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}



