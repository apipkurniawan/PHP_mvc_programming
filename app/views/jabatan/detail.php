<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title mb-4"><?= $data['jab']['id_jabatan']; ?></h5>
            <table>
                <tr>
                    <td width="50%"><h6 class="card-subtitle mb-3 text-muted">Nama Jabatan</h6></td>
                    <td width="5%"><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;" width="70%"><h6 class="card-subtitle mb-3"><?= $data['jab']['nama_jabatan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Tunjangan Jabatan</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['jab']['tunjangan_jabatan'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Tunjangan Keluarga</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['jab']['tunjangan_keluarga'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Tunjangan Anak</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['jab']['tunjangan_anak'],2,',','.'); ?></h6></td>
                </tr>
            </table>
    		<a href="<?= BASEURL; ?>/jabatan" class="card-link">kembali</a>    		
  		</div>
	</div>
	
</div>