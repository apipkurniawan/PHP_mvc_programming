<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title mb-4"><?= $data['kar']['id_karyawan']; ?></h5>            
            <table>
                <tr>
                    <td width="45%"><h6 class="card-subtitle mb-3 text-muted">Nama</h6></td>
                    <td width="5%"><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;" width="70%"><h6 class="card-subtitle mb-3"><?= $data['kar']['nama_karyawan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">Gaji Pokok</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3">Rp. <?= number_format($data['kar']['gaji_pokok'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">ID Golongan</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3"><?= $data['kar']['id_golongan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">ID Jabatan</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3"><?= $data['kar']['id_jabatan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">Divisi</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3"><?= $data['kar']['divisi']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">Status</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3"><?= $data['kar']['status_pernikahan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">Jumlah Anak</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3"><?= $data['kar']['jumlah_anak']; ?></h6></td>
                </tr>
            </table>
    		<a href="<?= BASEURL; ?>/karyawan" class="card-link">kembali</a>    		
  		</div>
	</div>
	
</div>