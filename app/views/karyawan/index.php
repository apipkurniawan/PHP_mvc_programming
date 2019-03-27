<div class="container mt-3">

  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashKaryawan(); ?> 
    </div>
  </div>
  <!-- ini adalah akhir flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal) -->


  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataKaryawan" data-toggle="modal" data-target="#formModal">
          Tambah Data Karyawan
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/karyawan/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari karyawan..." name="keyword" id="keyword" autocomplete="off">
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
       <h3>Daftar Karyawan</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['kar'] as $kar) : ?>
            <li class="list-group-item ">
              <?= $kar['nama_karyawan']; ?>
              <a href="<?= BASEURL; ?>/karyawan/hapus/<?= $kar['id_karyawan']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/karyawan/ubah/<?= $kar['id_karyawan']; ?>" class="badge badge-success float-right ml-1 tampilModalUbahKaryawan"  data-toggle="modal" data-target="#formModal" data-id="<?= $kar['id_karyawan']; ?>">Ubah</a>
              <a href="<?= BASEURL; ?>/karyawan/detail/<?= $kar['id_karyawan']; ?>" class="badge badge-primary float-right ml-1">Detail</a>                             
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body">        
        <form action="<?= BASEURL; ?>/karyawan/tambah" method="post" name="coba">
          <?php 
              $koneksi = mysqli_connect("localhost","root","","phpmvc");
              $karyawan = mysqli_query($koneksi, "SELECT id_karyawan FROM karyawan ORDER BY id_karyawan DESC");
              $kode_karyawan = mysqli_fetch_array($karyawan);
              $kodeKar = $kode_karyawan['id_karyawan'];
              $urut = substr($kodeKar,7,5);
              $tambah = (int) $urut + 1;
              $bln = date("m");
              $thn = date("y");

              if (strlen($tambah) == 1) {
                  $format = "KRY".$bln.$thn."0000".$tambah;
              } else if (strlen($tambah) == 2) {
                  $format = "KRY".$bln.$thn."000".$tambah;
              } else if (strlen($tambah) == 3) {
                  $format = "KRY".$bln.$thn."00".$tambah;
              } else if (strlen($tambah) == 4) {
                  $format = "KRY".$bln.$thn."0".$tambah;
              } else {
                  $format = "KRY".$bln.$thn.$tambah;                
              }
           ?>
          <div class="form-group">
            <label for="idKar">ID Karyawan</label>
            <input type="text" name="idKar" id="idKar" class="form-control" value="<?= $format; ?>" style="text-align: center; background-color: black; color: yellow;" required readonly>
          </div>
          <div class="form-group">
            <label for="namaKar">Nama Karyawan</label>
            <input type="text" name="namaKar" id="namaKar" class="form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="gajiPok">Gaji Pokok</label>
            <input type="number" name="gajiPok" id="gajiPok" class="form-control" required autocomplete="off" style="text-align: right;">
          </div>
          <div class="form-group">
            <label for="idGol">Golongan</label>
            <select class="form-control" id="idGol" name="idGol" required>
              <?php foreach ($data['gol'] as $gol) : ?>            
                <option value="<?= $gol['id_golongan']; ?>"><?= $gol['nama_golongan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="idJab">Jabatan</label>
            <select class="form-control" id="idJab" name="idJab" required>
              <?php foreach ($data['jab'] as $jab) : ?>            
                <option value="<?= $jab['id_jabatan']; ?>"><?= $jab['nama_jabatan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="divisi">Divisi</label>
            <select class="form-control" id="divisi" name="divisi" required>
              <option value="Personalia">Personalia</option>
              <option value="Pemasaran">Pemasaran</option>
              <option value="Keuangan">Keuangan</option>
              <option value="Produksi">Produksi</option>
              <option value="Umum">Umum</option>
            </select>
          </div>
          <div class="form-group">
            <label for="statusPer">Status Pernikahan</label>
            <select class="form-control" id="statusPer" name="statusPer" required>
              <option value="Menikah">Menikah</option>
              <option value="Belum Menikah">Belum Menikah</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jumlahAna">Jumlah Anak</label>
            <input type="number" name="jumlahAna" id="jumlahAna" class="form-control" required autocomplete="off">
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