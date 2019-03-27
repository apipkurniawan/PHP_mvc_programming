<?php 
class Gaji_model {

	// variable untuk mengelola database/menampung koneksi ke database
	private $table = 'gaji';
	private $table2 = 'karyawan';
	private $db; // variabel untuk menampung class database tadi

	// begitu di panggil construct nya langsung konek ke database
	public function __construct()
	{
		// instansiasi class database
		$this->db = new Database;
	}	

	// method ngambil datanya
	public function getAllGaji()
	{
		// jalankan query
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	// method untuk ngambil data berdasarkan id di url
	public function getGajiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_gaji=:id_gaji ');
		$this->db->bind('id_gaji', $id);
		return $this->db->single();
	}

	public function getTampilGajiPokokById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE id_karyawan=:id_karyawan ');
		$this->db->bind('id_karyawan', $id);
		return $this->db->single();
	}

	// method untuk menambah data 
	public function tambahDataDetailPotongan($data)
	{
		// $idGajiKaryawan = $data['idGaj'];
		// $tgl = $data['tanggal'];
		// $pecah = explode("-", $tgl);
		// $tahun = $pecah[0];
		// $bulan = $pecah[1];
		// // cek apakah karyawan bulan ini sudah gajian
		// $koneksi = mysqli_connect("localhost","root","","phpmvc");
		// $result = mysqli_query($koneksi, "SELECT id_karyawan FROM gaji WHERE DATE_FORMAT(tanggal,'%Y') = '$tahun' AND DATE_FORMAT(tanggal,'%m') = '$bulan'");
		// $hasil = mysqli_fetch_assoc($result); 
		// var_dump($hasil);die;
		// if (mysqli_fetch_assoc($result)) {
		// 	echo "<script>
		//  		alert('Karyawan sudah Gajian.!');
		//  	</script>";
		// 	// return false;	
		// } else {
		// 	echo "<script>
		//  		alert('Karyawan belum Gajian.!');
		//  	</script>";
		// }

		$query2 = "INSERT INTO detail_potongan VALUES (:id_gaji, :pph, :bpjs, :pinjaman_koperasi, :simpanan_wajib_koperasi, :potongan_lain)";
		$this->db->query($query2); // jalankan query
		$this->db->bind('id_gaji', $data['idGaj']); 
		$this->db->bind('pph', $data['pph']);
		$this->db->bind('bpjs', $data['bpjs']);
		$this->db->bind('pinjaman_koperasi', $data['pinjamanKop']);
		$this->db->bind('simpanan_wajib_koperasi', $data['simpananWaj']);
		$this->db->bind('potongan_lain', $data['potonganLai']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}
	public function tambahDataDetailPendapatan($data)
	{
		$query3 = "INSERT INTO detail_pendapatan VALUES (:id_gaji, :uang_transport, :uang_makan, :uang_lembur, :uang_lain)";
		$this->db->query($query3); // jalankan query
		$this->db->bind('id_gaji', $data['idGaj']); 
		$this->db->bind('uang_transport', $data['uangTra']);
		$this->db->bind('uang_makan', $data['uangMak']);
		$this->db->bind('uang_lembur', $data['uangLem']);
		$this->db->bind('uang_lain', $data['uangLai']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}
	public function tambahDataGaji($data)
	{ 
		$query = "INSERT INTO gaji VALUES (:id_gaji, :tanggal, :id_karyawan, :total_pendapatan, :total_potongan, :gaji_bersih, :keterangan)";
		$this->db->query($query); // jalankan query
		$this->db->bind('id_gaji', $data['idGaj']); 
		$this->db->bind('tanggal', $data['tanggal']); 
		$this->db->bind('id_karyawan', $data['idKar']);
		$this->db->bind('total_pendapatan', $data['totalPen']);
		$this->db->bind('total_potongan', $data['totalPot']);
		$this->db->bind('gaji_bersih', $data['gajiBer']);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->execute(); // eksekusi query
		return $this->db->rowCount(); // mengembalikan nilai untuk menghasilkan angka (method rowcount ada di file database.php dalam folder core)
	}

	// method untuk menghapus data
	public function hapusDataGaji($id)
	{
		$query = "DELETE FROM gaji WHERE id_gaji = :id_gaji";
		$this->db->query($query);
		$this->db->bind('id_gaji', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function hapusDataDetailPotongan($id)
	{
		$query = "DELETE FROM detail_potongan WHERE id_gaji = :id_gaji";
		$this->db->query($query);
		$this->db->bind('id_gaji', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function hapusDataDetailPendapatan($id)
	{
		$query = "DELETE FROM detail_pendapatan WHERE id_gaji = :id_gaji";
		$this->db->query($query);
		$this->db->bind('id_gaji', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	// method untuk mencari data
	public function cariDataGaji()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM gaji WHERE id_gaji LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this->db->resultSet();
	}
}



