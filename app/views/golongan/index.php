<div class="container mt-3">

  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashGolongan(); ?> 
    </div>
  </div>
  <!-- ini adalah akhir flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal) -->


  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataGolongan" data-toggle="modal" data-target="#formModal">
          Tambah Data Golongan
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/golongan/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari golongan..." name="keyword" id="keyword" autocomplete="off">
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
       <h3>Daftar Golongan</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['gol'] as $gol) : ?>
            <li class="list-group-item ">
              <?= $gol['nama_golongan']; ?>
              <a href="<?= BASEURL; ?>/golongan/hapus/<?= $gol['id_golongan']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/golongan/ubah/<?= $gol['id_golongan']; ?>" class="badge badge-success float-right ml-1 tampilModalUbahGolongan"  data-toggle="modal" data-target="#formModal" data-id="<?= $gol['id_golongan']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/golongan/detail/<?= $gol['id_golongan']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Golongan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body">        
        <form action="<?= BASEURL; ?>/golongan/tambah" method="post">
          <?php 
              $koneksi = mysqli_connect("localhost","root","","phpmvc");
              $golongan = mysqli_query($koneksi, "SELECT id_golongan FROM golongan ORDER BY id_golongan DESC");
              $kode_golongan = mysqli_fetch_array($golongan);
              $kodeGol = $kode_golongan['id_golongan'];
              $urut = substr($kodeGol,3,3);
              $tambah = (int) $urut + 1;
              
              if (strlen($tambah) == 1) {
                  $format = "GOL"."00".$tambah;
              } else if (strlen($tambah) == 2) {
                  $format = "GOL"."0".$tambah;
              } else {
                  $format = "GOL".$tambah;
              } 
           ?>
          <div class="form-group">
            <label for="idGol">ID Golongan</label>
            <input type="text" name="idGol" id="idGol" class="form-control" value="<?= $format; ?>" style="text-align: center; color: yellow; background-color: black; " required readonly>
          </div>
          <div class="form-group">
            <label for="namaGol">Nama Golongan</label>
            <input type="text" name="namaGol" id="namaGol" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tunjanganGol">Tunjangan golongan</label>
            <input type="number" name="tunjanganGol" id="tunjanganGol" class="form-control" required autocomplete="off" style="text-align: right;">
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