<div class="container mt-5">

	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title"><?= $data['use']['nama_user']; ?></h5>
            <br>
            <h6 class="card-subtitle mb-2 text-muted">Status User : </h6><p><?= $data['use']['status_user']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Password User : </h6><p><?= $data['use']['password_user']; ?></p>
    		<a href="<?= BASEURL; ?>/user" class="card-link">kembali</a>    		
  		</div>
	</div>
	
</div>