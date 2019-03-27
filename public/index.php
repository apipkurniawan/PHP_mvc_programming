<?php 
// menjalankaan session nya
if(!session_id()) { // jika tidak ada session
	session_start(); // maka jalankan sessionnya
}

// ini adalah proses bootstraping
// Memanggil file init yang ada dalam folder app
require_once '../app/init.php';

// instansiasi object dari class App
$app = new App;