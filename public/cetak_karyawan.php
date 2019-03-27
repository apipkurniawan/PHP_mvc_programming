<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$koneksi = mysqli_connect("localhost","root","","phpmvc");
$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
$profil = mysqli_query($koneksi, "SELECT * FROM profil");
$isi_profil = mysqli_fetch_assoc($profil);
// menghitung jumlah karyawan
$jumlah_karyawan = mysqli_num_rows($karyawan);


// header
$html = '<h3 style="text-align:center; font-family:Arial Black;">Laporan Data Karyawan '.$isi_profil["nama_perusahaan"].'</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">'.$isi_profil["alamat"].' Cikarang-Bekasi</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">Telp : '.$isi_profil["telp"].'</h3>';
$html .= '<hr><br>';

// isi
$html .= '<p style="font-family:arial;"><i>Print Out : <span style="color:red;">'.date('l, d-m-Y').'</span></i></p>';
$html .= '<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>ID karyawan</th>
			<th>Nama karyawan</th>
			<th>Gaji Pokok</th>
			<th>ID Golongan</th>
			<th>ID Jabatan</th>
			<th>Divisi</th>
			<th>Status</th>
			<th>Jumlah Anak</th>
		</tr>';

$i = 1;
foreach($karyawan as $row) {
	$html .= '<tr>
		<td>'.$i++.'.</td>
		<td>'.$row["id_karyawan"].'</td>
		<td>'.$row["nama_karyawan"].'</td>
		<td style="text-align:right;">'.number_format($row["gaji_pokok"],0,',','.').'</td>
		<td>'.$row["id_golongan"].'</td>
		<td>'.$row["id_jabatan"].'</td>
		<td>'.$row["divisi"].'</td>
		<td>'.$row["status_pernikahan"].'</td>
		<td style="text-align:center;">'.$row["jumlah_anak"].'</td>
	</tr>';
}

$html .= '</table><br>';

// footer
$html .= '<table>
			<tr>
				<td>Total Karyawan</td>
				<td>:</td>
				<td></td>
				<td style="text-align:right;"><b>'.$jumlah_karyawan.'</b> orang</td>
			</tr>
		  </table>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data_karyawan.pdf', \Mpdf\Output\Destination::INLINE);
