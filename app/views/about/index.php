<div class="container">
	<div class="jumbotron mt-4">
		<h1 class="display-4" style="text-align: center;">About Me</h1>
		<div style="text-align: center;">
			<img src="<?= BASEURL; ?>/img/profile.jpg" alt= "apip kurniawan" width ="200" class="rounded-circle shadow">
		</div>
		<br><br>
		<form action="" method="" style="text-align: center;">
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="Nama">
              <input type="text" readonly value="<?= $data['nama']; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="TTL">
              <input type="text" readonly value="Kuningan, 29 Mei 1992">
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="Alamat">
              <input type="text" readonly value="Cibitung">
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="Status">
              <input type="text" readonly value="Belum Menikah">
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="Pekerjaan">
			  <input type="text" readonly value="<?= $data['pekerjaan']; ?>">
            </div>
          </div>
			
          <div class="row">
            <div class="col-sm">
              <input type="text" disabled value="No. HP">
			  <input type="text" readonly value="081293528605">
            </div>
          </div>
    	</form>    	
    	<br>
		<p class="lead">Aplikasi Penggajian ini adalah sebuah aplikasi pertama saya yang berbasis web dengan menggunakan bahasa pemrograman PHP dengan teknik MVC Programming, Jquery(Framework Javascript), Bootstrap framework dan database MySQL.</p> 
		<!-- $data adalah yang di panggil dari controller untuk di tampilkan di layar -->
	</div>	
</div>
