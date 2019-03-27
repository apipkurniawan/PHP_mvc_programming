<div class="container mt-3">

  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashProfil(); ?> 
    </div>
  </div>
  <!-- ini adalah akhir flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal) -->


  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataProfil" data-toggle="modal" data-target="#formModal">
          Tambah Data Profil
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/profil/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari profil..." name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </div>
        </form>    
    </div>
  </div>
  <!-- ini adalah akhir tombol cari -->


  <!-- ini adalah awal tampilan list nya -->
  <div class="row">
    <div class="col-lg-6">
       <h3>Daftar Profil</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['pro'] as $pro) : ?>
            <li class="list-group-item ">
              <?= $pro['nama_perusahaan']; ?>
              <a href="<?= BASEURL; ?>/profil/hapus/<?= $pro['id_profil']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/profil/ubah/<?= $pro['id_profil']; ?>" class="badge badge-success float-right ml-1 tampilModalUbahProfil"  data-toggle="modal" data-target="#formModal" data-id="<?= $pro['id_profil']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/profil/detail/<?= $pro['id_profil']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
            </li>
          <?php endforeach; ?>
       </ul>
       <!-- ini adalah akhir data dari database -->
    </div>
  </div>
  <!-- ini adalah akhir tampilan list nya -->
  
</div>



<!-- ini adalah awal Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- header -->
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body">        
        <form action="<?= BASEURL; ?>/profil/tambah" method="post">
          <input type="hidden" name="idPro" id="idPro">
          <div class="form-group">
            <label for="namaPer">Nama Perusahaan</label>
            <input type="text" name="namaPer" id="namaPer" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="telp">Telp</label>
            <input type="number" name="telp" id="telp" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="fax">Fax</label>
            <input type="number" name="fax" id="fax" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="website">Website</label>
            <input type="text" name="website" id="website" class="form-control" required autocomplete="off">
          </div>
          <!-- footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- ini adalah akhir Modal -->