<?php 

class Flasher {
    // method set flash nya dengan menggunakan method static jadi ga perlu instansiasi
    // set flash
	public static function setFlash($pesan, $aksi, $tipe)
	{
		$_SESSION['flash'] = [
			'pesan' => $pesan,
			'aksi' => $aksi,
			'tipe' => $tipe
		];
	}
	
	// awal method flash karyawan
	public static function flashKaryawan()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Data Karyawan <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}	
	// akhir method flash karyawan

	// awal method flash jabatan
	public static function flashJabatan()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Data jabatan <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}
	// akhir method flash jabatan

	// awal method flash Golongan
	public static function flashGolongan()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Data Golongan <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}
	// akhir method flash Golongan

	// awal method flash Profil
	public static function flashProfil()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Profil <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}
	// akhir method flash Profil

	// awal method flash Gaji
	public static function flashGaji()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Data Gaji <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}
	// akhir method flash Gaji

	// awal method flash Gaji
	public static function flashUser()
	{
		if( isset($_SESSION['flash'])){
			echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
  					Data User <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				  </div>';
			unset($_SESSION['flash']); // memberhentikan sessionnya
		}
	}
	// akhir method flash Gaji

}