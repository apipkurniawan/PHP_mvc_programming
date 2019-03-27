<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$koneksi = mysqli_connect("localhost","root","","phpmvc");
$golongan = mysqli_query($koneksi, "SELECT * FROM golongan");
$profil = mysqli_query($koneksi, "SELECT * FROM profil");
$isi_profil = mysqli_fetch_assoc($profil);
// menghitung jumlah karyawan
$jumlah_golongan = mysqli_num_rows($golongan);

// header
$html = '<h3 style="text-align:center; font-family:Arial Black;">Laporan Data Golongan '.$isi_profil["nama_perusahaan"].'</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">'.$isi_profil["alamat"].' Cikarang-Bekasi</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">Telp : '.$isi_profil["telp"].'</h3>';
$html .= '<hr><br>';

// isi
$html .= '<p style="font-family:arial;"><i>Print Out : <span style="color:red;">'.date('l, d-m-Y').'</span></i></p>';
$html .= '<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>ID Golongan</th>
			<th>Nama Golongan</th>
			<th>Tunjangan Golongan</th>
		</tr>';

$i = 1;
foreach($golongan as $row) {
	$html .= '<tr>
		<td>'.$i++.'.</td>
		<td>'.$row["id_golongan"].'</td>
		<td>'.$row["nama_golongan"].'</td>
		<td style="text-align:right;">'.number_format($row["tunjangan_golongan"],0,',','.').'</td>
	</tr>';
}

$html .= '</table><br>';

// footer
$html .= '<table>
			<tr>
				<td>Total Golongan</td>
				<td>:</td>
				<td></td>
				<td style="text-align:right;"><b>'.$jumlah_golongan.'</b> Golongan</td>
			</tr>
		  </table>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data_golongan.pdf', \Mpdf\Output\Destination::INLINE);
