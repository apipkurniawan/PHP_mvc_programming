<div class="container mt-3">

  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashUser(); ?> 
    </div>
  </div>
  <!-- ini adalah akhir flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal) -->


  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataUser" data-toggle="modal" data-target="#formModal">
          Tambah Data User
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/user/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari user..." name="keyword" id="keyword" autocomplete="off">
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
       <h3>Daftar user</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['use'] as $use) : ?>
            <li class="list-group-item ">
              <?= $use['nama_user']; ?>
              <a href="<?= BASEURL; ?>/user/hapus/<?= $use['id_user']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/user/ubah/<?= $use['id_user']; ?>" class="badge badge-success float-right ml-1 tampilModalUbahUser"  data-toggle="modal" data-target="#formModal" data-id="<?= $use['id_user']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/user/detail/<?= $use['id_user']; ?>" class="badge badge-primary float-right ml-1">Detail</a>                             
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body">        
        <form action="<?= BASEURL; ?>/user/tambah" method="post">
          <input type="hidden" name="idUse" id="idUse">
          <div class="form-group">
            <label for="namaUse">Nama User</label>
            <input type="text" name="namaUse" id="namaUse" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="statusUse">Status User</label>
            <input type="text" name="statusUse" id="statusUse" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="passwordUse">Password User</label>
            <input type="text" name="passwordUse" id="passwordUse" class="form-control" required autocomplete="off">
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