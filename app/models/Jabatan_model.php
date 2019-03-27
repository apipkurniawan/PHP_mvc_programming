<?php 

class Jabatan_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'jabatan';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllJabatan()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getJabatanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_jabatan=:id_jabatan ');
		$this->db->bind('id_jabatan', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataJabatan($data)
	{
		$query = "INSERT INTO jabatan VALUES (:id_jabatan, :nama_jabatan, :tunjangan_jabatan, :tunjangan_keluarga, :tunjangan_anak)";
		$this->db->query($query); // jalankan query
		$this->db->bind('id_jabatan', $data['idJab']); 
		$this->db->bind('nama_jabatan', $data['namaJab']); 
		$this->db->bind('tunjangan_jabatan', $data['tunjanganJab']);
		$this->db->bind('tunjangan_keluarga', $data['tunjanganKel']);
		$this->db->bind('tunjangan_anak', $data['tunjanganAna']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataJabatan($id)
	{
		$query = "DELETE FROM jabatan WHERE id_jabatan = :id_jabatan";
		$this->db->query($query);
		$this->db->bind('id_jabatan', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mengubah data
	public function ubahDataJabatan($data)
	{
		$query = "UPDATE jabatan SET 
					nama_jabatan = :namaJab,
					tunjangan_jabatan = :tunjanganJab,
					tunjangan_keluarga = :tunjanganKel,
					tunjangan_anak = :tunjanganAna
					WHERE id_jabatan = :idJab";

		$this->db->query($query);
		$this->db->bind('namaJab', $data['namaJab']);
		$this->db->bind('tunjanganJab', $data['tunjanganJab']);
		$this->db->bind('tunjanganKel', $data['tunjanganKel']);
		$this->db->bind('tunjanganAna', $data['tunjanganAna']);
		$this->db->bind('idJab', $data['idJab']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataJabatan()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM jabatan WHERE nama_jabatan LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}



