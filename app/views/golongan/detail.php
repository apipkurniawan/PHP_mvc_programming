<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title mb-4"><?= $data['gol']['id_golongan']; ?></h5>
            <table>
                <tr>
                    <td width="50%"><h6 class="card-subtitle mb-3 text-muted">Nama Gol</h6></td>
                    <td width="5%"><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;" width="100%"><h6 class="card-subtitle mb-3"><?= $data['gol']['nama_golongan']; ?></h6></td>
                </tr>
                <tr>
                    <td><h6 class="card-subtitle mb-3 text-muted">Tunjangan Gol</h6></td>
                    <td><h6 class="card-subtitle mb-3 text-muted">:</h6></td>
                    <td style="color: red;"><h6 class="card-subtitle mb-3">Rp. <?= number_format($data['gol']['tunjangan_golongan'],2,',','.'); ?></h6></td>
                </tr>
            </table>
    		<a href="<?= BASEURL; ?>/golongan" class="card-link">kembali</a>    		
  		</div>
	</div>
	
</div>