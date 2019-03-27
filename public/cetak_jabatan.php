<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$koneksi = mysqli_connect("localhost","root","","phpmvc");
$jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");
$profil = mysqli_query($koneksi, "SELECT * FROM profil");
$isi_profil = mysqli_fetch_assoc($profil);
// menghitung jumlah karyawan
$jumlah_jabatan = mysqli_num_rows($jabatan);

// header
$html = '<h3 style="text-align:center; font-family:Arial Black;">Laporan Data Jabatan '.$isi_profil["nama_perusahaan"].'</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">'.$isi_profil["alamat"].' Cikarang-Bekasi</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">Telp : '.$isi_profil["telp"].'</h3>';
$html .= '<hr><br>';

// isi
$html .= '<p style="font-family:arial;"><i>Print Out : <span style="color:red;">'.date('l, d-m-Y').'</span></i></p>';
$html .= '<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>ID Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Tunjangan Jabatan</th>
			<th>Tunjangan Keluarga</th>
			<th>Tunjangan Anak</th>
		</tr>';

$i = 1;
foreach($jabatan as $row) {
	$html .= '<tr>
		<td>'.$i++.'.</td>
		<td>'.$row["id_jabatan"].'</td>
		<td>'.$row["nama_jabatan"].'</td>
		<td style="text-align:right;">'.number_format($row["tunjangan_jabatan"],0,',','.').'</td>
		<td style="text-align:right;">'.number_format($row["tunjangan_keluarga"],0,',','.').'</td>
		<td style="text-align:right;">'.number_format($row["tunjangan_anak"],0,',','.').'</td>
	</tr>';
}
	
$html .= '</table><br>';

// footer
$html .= '<table>
			<tr>
				<td>Total Jabatan</td>
				<td>:</td>
				<td></td>
				<td style="text-align:right;"><b>'.$jumlah_jabatan.'</b> jabatan</td>
			</tr>
		  </table>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data_jabatan.pdf', \Mpdf\Output\Destination::INLINE);
