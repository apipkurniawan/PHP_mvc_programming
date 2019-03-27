<div class="container mt-3">

  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashjabatan(); ?> 
    </div>
  </div>
  <!-- ini adalah akhir flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal) -->


  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataJabatan" data-toggle="modal" data-target="#formModal">
          Tambah Data Jabatan
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/jabatan/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari jabatan..." name="keyword" id="keyword" autocomplete="off">
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
       <h3>Daftar Jabatan</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['jab'] as $jab) : ?>
            <li class="list-group-item ">
              <?= $jab['nama_jabatan']; ?>
              <a href="<?= BASEURL; ?>/jabatan/hapus/<?= $jab['id_jabatan']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/jabatan/ubah/<?= $jab['id_jabatan']; ?>" class="badge badge-success float-right ml-1 tampilModalUbahJabatan"  data-toggle="modal" data-target="#formModal" data-id="<?= $jab['id_jabatan']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/jabatan/detail/<?= $jab['id_jabatan']; ?>" class="badge badge-primary float-right ml-1">Detail</a>                             
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body">        
        <form action="<?= BASEURL; ?>/jabatan/tambah" method="post">
          <?php 
              $koneksi = mysqli_connect("localhost","root","","phpmvc");
              $jabatan = mysqli_query($koneksi, "SELECT id_jabatan FROM jabatan ORDER BY id_jabatan DESC");
              $kode_jabatan = mysqli_fetch_array($jabatan);
              $kodeJab = $kode_jabatan['id_jabatan'];
              $urut = substr($kodeJab,3,3);
              $tambah = (int) $urut + 1;

              if (strlen($tambah) == 1) {
                  $format = "JAB"."00".$tambah;
              } else if (strlen($tambah) == 2) {
                  $format = "JAB"."0".$tambah;
              } else if (strlen($tambah) == 3) {
                  $format = "JAB".$tambah;
              }
           ?>
          <div class="form-group">
            <label for="idJab">ID jabatan</label>
            <input type="text" name="idJab" id="idJab" class="form-control" value="<?= $format; ?>" style="text-align: center; background-color: black; color: yellow;" required readonly>
          </div>
          <div class="form-group">
            <label for="namaJab">Nama jabatan</label>
            <input type="text" name="namaJab" id="namaJab" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tunjanganJab">Tunjangan Jabatan</label>
            <input type="number" name="tunjanganJab" id="tunjanganJab" class="form-control" required autocomplete="off" style="text-align: right;">
          </div>
          <div class="form-group">
            <label for="tunjanganKel">Tunjangan Keluarga</label>
            <input type="number" name="tunjanganKel" id="tunjanganKel" class="form-control" required autocomplete="off" style="text-align: right;">
          </div>
          <div class="form-group">
            <label for="tunjanganAna">Tunjangan Anak</label>
            <input type="number" name="tunjanganAna" id="tunjanganAna" class="form-control" required autocomplete="off" style="text-align: right;">
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