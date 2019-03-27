<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title mb-4"><?= $data['gaj']['id_gaji']; ?></h5>    
            <table>
                <tr>
                    <td width="45%"><h6 class="card-subtitle mb-4 text-muted">Tanggal</h6></td>
                    <td width="5%"><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;" width="70%"><h6 class="card-subtitle mb-4"><?= $data['gaj']['tanggal']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">ID Karyawan</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-4"><?= $data['gaj']['id_karyawan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Total Pendapatan</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red; text-align: right;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['gaj']['total_pendapatan'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Total Potongan</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red; text-align: right;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['gaj']['total_potongan'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Gaji Bersih</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red; text-align: right;"><h6 class="card-subtitle mb-4">Rp. <?= number_format($data['gaj']['gaji_bersih'],2,',','.'); ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-4 text-muted">Keterangan</h6></td>
                    <td><h6 class="card-subtitle mb-4 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-4"><?= $data['gaj']['keterangan']; ?></h6></td>
                </tr>
            </table>
    		<a href="<?= BASEURL; ?>/gaji" class="card-link">kembali</a> 
  		</div>
	</div>
</div>