<?php

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$koneksi = mysqli_connect("localhost","root","","phpmvc");
$gaji = mysqli_query($koneksi, "SELECT * FROM gaji");
$profil = mysqli_query($koneksi, "SELECT * FROM profil");
$isi_profil = mysqli_fetch_assoc($profil);

// menjumlahkan field pada tabel
while ($r = mysqli_fetch_array($gaji))
{
    //Looping Untuk menampilkan data (namabarang,jumlah,harga)
    $jumlah_gaji[] = $r['gaji_bersih'];
    $jumlah_potongan[] = $r['total_potongan'];
    $jumlah_pendapatan[] = $r['total_pendapatan'];
}
//Total
$jumlahGaji = array_sum($jumlah_gaji);
$jumlahPotongan = array_sum($jumlah_potongan);
$jumlahPendapatan = array_sum($jumlah_pendapatan);

// header
$html = '<h3 style="text-align:center; font-family:Arial Black;">Laporan Data Gaji Karyawan '.$isi_profil["nama_perusahaan"].'</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">'.$isi_profil["alamat"].' Cikarang-Bekasi</h3>';
$html .= '<h3 style="text-align:center; font-family:Arial Black;">Telp : '.$isi_profil["telp"].'</h3>';
$html .= '<hr><br>';

// isi
$html .= '<p style="font-family:arial;"><i>Print Out : <span style="color:red;">'.date('l, d-m-Y').'</span></i></p>';
$html .= '<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>ID Gaji</th>
			<th>Tanggal</th>
			<th>ID Karyawan</th>
			<th>Total Pendapatan</th>
			<th>Total Potongan</th>
			<th>Gaji Bersih</th>
			<th>Keterangan</th>
		</tr>';
// menampilkan data gaji
$i = 1;
foreach($gaji as $row) {
	$html .= '<tr>
		<td>'.$i++.'.</td>
		<td>'.$row["id_gaji"].'</td>
		<td>'.$row["tanggal"].'</td>
		<td>'.$row["id_karyawan"].'</td>
		<td style="text-align:right;">'.number_format($row["total_pendapatan"],0,',','.').'</td>
		<td style="text-align:right;">'.number_format($row["total_potongan"],0,',','.').'</td>
		<td style="text-align:right;">'.number_format($row["gaji_bersih"],0,',','.').'</td>
		<td>'.$row["keterangan"].'</td>
	</tr>';
}
	
$html .= '</table> <br>';

// membuat format currency 
$hasil_gaji = number_format($jumlahGaji,0,',','.');
$hasil_potongan = number_format($jumlahPotongan,0,',','.');
$hasil_pendapatan = number_format($jumlahPendapatan,0,',','.');

// footer
$html .= '<table>
			<tr>
				<td width="60%" style="font-family:arial;">Total Gaji Bersih Karyawan</td>
				<td width="7%">:</td>
				<td style="text-align:right;"><b>'.$hasil_gaji.'</b></td>
			</tr>
			<tr>
				<td style="font-family:arial;">Total Potongan Karyawan</td>
				<td>:</td>
				<td style="text-align:right;"><b>'.$hasil_potongan.'</b></td>
			</tr>
			<tr>
				<td style="font-family:arial;">Total Pendapatan Karyawan</td>
				<td>:</td>
				<td style="text-align:right;"><b>'.$hasil_pendapatan.'</b></td>
			</tr>
		  </table>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data_Gaji.pdf', \Mpdf\Output\Destination::INLINE);
