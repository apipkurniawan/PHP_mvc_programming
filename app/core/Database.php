<?php 

// ini merupakan class utama
// ini bisa dipakai untuk tabel manapun nantinya
class Database {

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	// variabel untuk koneksinya
	private $dbh; // database handler
	private $stmt; 

	
	public function __construct()
	{
		// data source name
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

		// parameter konfigurasi database agar terjaga terus
		$option = 
		[
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option); // parameter option digunakan untuk mengoptimasi koneksi ke database 

		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}


	// function untuk menjalankan query
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}


	// binding data nya
	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) { // kalo typenya null
			switch(true) { // jalankan switch
				case is_int($value) : // kalo valuenya integer
					$type = PDO::PARAM_INT; // type nya set menjadi int
					break;
				case is_bool($value) : // kalo valuenya boolean
					$type = PDO::PARAM_BOOL; // typenya set menjadi boolean
					break;
				case is_null($value) : // klo valuenya null
					$type = PDO::PARAM_NULL; // typenya set menjadi null
					break;
				default : // selain dari itu kita buat default
					$type = PDO::PARAM_STR; // type nya set menjadi string 
			}
		}
		// supaya aman kita bind
		$this->stmt->bindValue($param, $value, $type);
	}

	// untuk mengeksekusi
	public function execute()
	{
		$this->stmt->execute();
	}

	// kalo banyak data misal select * from .... 
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// kalo cuma satu data
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}	

	// untuk menghitung nilai
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}	

}