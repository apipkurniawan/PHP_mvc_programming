<?php 

class Karyawan_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'karyawan';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllKaryawan()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getKaryawanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_karyawan=:id_karyawan ');
		$this->db->bind('id_karyawan', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataKaryawan($data)
	{ 
		$query = "INSERT INTO karyawan VALUES (:id_karyawan, :nama_karyawan, :gaji_pokok, :id_golongan, :id_jabatan, :divisi, :status_pernikahan, :jumlah_anak)";
		$this->db->query($query); // jalankan query
		$this->db->bind('id_karyawan', $data['idKar']); 
		$this->db->bind('nama_karyawan', $data['namaKar']); 
		$this->db->bind('gaji_pokok', $data['gajiPok']);
		$this->db->bind('id_golongan', $data['idGol']);
		$this->db->bind('id_jabatan', $data['idJab']);
		$this->db->bind('divisi', $data['divisi']);
		$this->db->bind('status_pernikahan', $data['statusPer']);
		$this->db->bind('jumlah_anak', $data['jumlahAna']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataKaryawan($id)
	{
		$query = "DELETE FROM karyawan WHERE id_karyawan = :id_karyawan";
		$this->db->query($query);
		$this->db->bind('id_karyawan', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mengubah data
	public function ubahDataKaryawan($data)
	{
		$query = "UPDATE karyawan SET 
					nama_karyawan = :namaKar,
					gaji_pokok = :gajiPok,
					id_golongan = :idGol,
					id_jabatan = :idJab,
					divisi = :divisi,
					status_pernikahan = :statusPer,
					jumlah_anak = :jumlahAna
					WHERE id_karyawan = :idKar";

		$this->db->query($query);
		$this->db->bind('namaKar', $data['namaKar']);
		$this->db->bind('gajiPok', $data['gajiPok']);
		$this->db->bind('idGol', $data['idGol']);
		$this->db->bind('idJab', $data['idJab']);
		$this->db->bind('divisi', $data['divisi']);
		$this->db->bind('statusPer', $data['statusPer']);
		$this->db->bind('jumlahAna', $data['jumlahAna']);
		$this->db->bind('idKar', $data['idKar']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataKaryawan()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM karyawan WHERE nama_karyawan LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}



