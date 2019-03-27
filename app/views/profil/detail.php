<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title"><?= $data['pro']['nama_perusahaan']; ?></h5>
            <br>
            <h6 class="card-subtitle mb-2 text-muted">Alamat  : </h6><p><?= $data['pro']['alamat']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Telp    : </h6><p><?= $data['pro']['telp']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Fax     : </h6><p><?= $data['pro']['fax']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Email   : </h6><p><?= $data['pro']['email']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Website : </h6><p><?= $data['pro']['website']; ?></p>
    		<a href="<?= BASEURL; ?>/profil" class="card-link">kembali</a>    		
  		</div>
	</div>
	
</div>