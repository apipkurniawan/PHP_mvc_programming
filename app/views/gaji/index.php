<div class="container mt-3">
  <!-- ini adalah awal flasher (untuk membuat notifikasi/pemberitahuan berhasil atau gagal/tampilan flashnya) -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flashGaji(); ?> 
    </div>
  </div>
  
  <!-- ini adalah awal tombol tambah data -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataGaji" data-toggle="modal" data-target="#formModal">
          Tambah Data Gaji
      </button>  
    </div>
  </div>
  <!-- ini adalah akhir tombol tambah data -->


  <!-- ini adalah awal tombol cari -->
  <div class="row mb-3">
    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/gaji/cari" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari gaji..." name="keyword" id="keyword" autocomplete="off">
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
       <h3>Daftar Gaji</h3>  
       <!-- ini adalah awal data dari database -->
       <ul class="list-group">
          <?php foreach ($data['gaj'] as $gaj) : ?>
            <li class="list-group-item ">
              <?= $gaj['id_gaji']; ?>
              <a href="<?= BASEURL; ?>/gaji/hapus/<?= $gaj['id_gaji']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin.?');">Hapus</a>
              <a href="<?= BASEURL; ?>/gaji/detail/<?= $gaj['id_gaji']; ?>" class="badge badge-primary float-right ml-1">Detail</a>                             
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Gaji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi -->
      <div class="modal-body col">        
        <form action="<?= BASEURL; ?>/gaji/tambah" method="post" name="coba">
          <?php 
              $koneksi = mysqli_connect("localhost","root","","phpmvc");
              $gaji = mysqli_query($koneksi, "SELECT id_gaji FROM gaji ORDER BY id_gaji DESC");
              $kode_gaji = mysqli_fetch_array($gaji);
              $kode = $kode_gaji['id_gaji'];
              $urut = substr($kode,6,5);
              $tambah = (int) $urut + 1;
              $bln = date("m");
              $thn = date("y");

              if (strlen($tambah) == 1) {
                  $format = "GJ".$bln.$thn."0000".$tambah;
              } else if (strlen($tambah) == 2) {
                  $format = "GJ".$bln.$thn."000".$tambah;
              } else if (strlen($tambah) == 3) {
                  $format = "GJ".$bln.$thn."00".$tambah;
              } else if (strlen($tambah) == 4) {
                  $format = "GJ".$bln.$thn."0".$tambah;
              } else {
                  $format = "GJ".$bln.$thn.$tambah;                
              }
           ?>
          <div class="row">
            <div class="form-group col-sm">
              <label for="idGaj">ID Gaji</label>
              <input type="text" name="idGaj" id="idGaj" class="form-control" readonly required value="<?= $format; ?>" style="text-align: center; background-color: black; color: yellow;">
            </div>
            <div class="form-group col-sm">
              <label for="tanggal">Tanggal</label>
              <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date("Y-m-d"); ?>" required style="text-align: center;">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col">
              <label for="idKar">Nama Karyawan</label>
              <select class="form-control" id="idKar" name="idKar" required onchange="Price()">
                <?php foreach ($data['kar'] as $kar) : ?>
                  <option value="<?= $kar['id_karyawan']; ?>"> <?= $kar['id_karyawan']; ?> | <?= $kar['nama_karyawan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm">
              <label for="gajiPok">Gaji Pokok</label>
              <input type="number" name="gajiPok" id="gajiPok" class="form-control" required readonly style="text-align: right;">
              <input type="hidden" name="nikah" id="nikah" class="form-control">
              <input type="hidden" name="anak" id="anak" class="form-control">
            </div>
            <div class="form-group col-sm">
              <label for="uangTra">Uang Transport</label>
              <input type="number" name="uangTra" id="uangTra" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm">
              <label for="tunjanganGol">Tunjangan Golongan</label>
              <input type="number" name="tunjanganGol" id="tunjanganGol" class="form-control" required readonly style="text-align: right;">
            </div>
            <div class="form-group col-sm">
              <label for="uangMak">Uang Makan</label>
              <input type="number" name="uangMak" id="uangMak" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm">
              <label for="tunjanganJab">Tunjangan Jabatan</label>
              <input type="number" name="tunjanganJab" id="tunjanganJab" class="form-control" required readonly style="text-align: right;">
            </div>
            <div class="form-group col-sm">
              <label for="uangLem">Uang Lembur</label>
              <input type="number" name="uangLem" id="uangLem" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm">
              <label for="tunjanganKel">Tunjangan Keluarga</label>
              <input type="number" name="tunjanganKel" id="tunjanganKel" class="form-control" required readonly style="text-align: right;">
            </div>
            <div class="form-group col-sm">
              <label for="uangLai">Uang Lain-lain</label>
              <input type="number" name="uangLai" id="uangLai" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="tunjanganAna">Tunjangan Anak</label>
              <input type="number" name="tunjanganAna" id="tunjanganAna" class="form-control" required readonly style="text-align: right;">
            </div>
            <div class="form-group col-sm">
              <label for="simpananWaj">Simpanan Wajib Koperasi</label>
              <input type="number" name="simpananWaj" id="simpananWaj" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-sm">
              <label for="pph">PPh 21</label>
              <input type="number" name="pph" id="pph" class="form-control" readonly required style="text-align: right;">
            </div>
            <div class="form-group col-sm">
              <label for="pinjamanKop">Pinjaman Koperasi</label>
              <input type="number" name="pinjamanKop" id="pinjamanKop" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm">
              <label for="bpjs">BPJS</label>
              <input type="number" name="bpjs" id="bpjs" class="form-control" readonly required style="text-align: right;">
            </div>
            <div class="form-group col-sm-6">
              <label for="potonganLai">Potongan Lain-lain</label>
              <input type="number" name="potonganLai" id="potonganLai" class="form-control" required onfocusout="hitungGajiKaryawan()" style="text-align: right;">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-10 offset-1">
              <label style="color: red;"><i>pastikan data yang anda masukan sudah benar.!</i></label>
            </div>
          </div>       
          <div class="row">
            <div class="form-group col-sm-6 offset-3">
              <input type="button" name="hitungGaji" id="hitungGaji" value="Hitung Gaji Bersih" style="background-color: #007BFF; color: white;" class="form-control" readonly onclick="hitungGajiKaryawan()">
            </div>
          </div>                      

          <div class="form-group">
            <label for="totalPen">Total Pendapatan</label>
            <input type="number" name="totalPen" id="totalPen" class="form-control" readonly required style="text-align: right;">
          </div>

          <div class="form-group">
            <label for="totalPot">Total Potongan</label>
            <input type="number" name="totalPot" id="totalPot" class="form-control" readonly required style="text-align: right;">
          </div>
          <div class="form-group">
            <label for="gajiBer">Gaji Bersih</label>
            <input type="number" name="gajiBer" id="gajiBer" class="form-control" required readonly style="font-weight: bold;text-align: right;">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" required value="Ok">
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
<script>
  function Price() {
    // ajax untuk menampilkan data karyawan berdasarkan id karyawan 
    const id = document.getElementById("idKar").value;
    $.ajax({
     url:'http://localhost/phpmvc/public/gaji/tampilGaji',
     data: {id : id},
     method: 'post',
     dataType: 'json',
     success: function(data) {
       // menampilkan value 
       $('#gajiPok').val(data.gaji_pokok);
       $('#nikah').val(data.status_pernikahan);
       $('#anak').val(data.jumlah_anak);


       // ajax untuk menampilkan data golongan berdasarkan id golongan
       const id2 = (data.id_golongan);
       $.ajax({
         url:'http://localhost/phpmvc/public/golongan/tampilTunjanganGolongan',
         data: {id : id2},
         method: 'post',
         dataType: 'json',
         success: function(data) {
            // menampilkan value 
            $('#tunjanganGol').val(data.tunjangan_golongan);
         }
       });


       // ajax untuk menampilkan data tunjangan berdasarkan id jabatan
       var anak = document.getElementById('anak').value;
       if ((data.status_pernikahan) == "Menikah") {
          if (anak == "0") {
            const id3 = (data.id_jabatan);
            $.ajax({
            url:'http://localhost/phpmvc/public/jabatan/tampilTunjanganJabatan',
            data: {id : id3},
            method: 'post',
            dataType: 'json',
            success: function(data) {
              // menampilkan value 
              $('#tunjanganJab').val(data.tunjangan_jabatan);
              $('#tunjanganKel').val(data.tunjangan_keluarga);
              $('#tunjanganAna').val('0');
              }
            });
          } else {
            const id3 = (data.id_jabatan);
            $.ajax({
            url:'http://localhost/phpmvc/public/jabatan/tampilTunjanganJabatan',
            data: {id : id3},
            method: 'post',
            dataType: 'json',
            success: function(data) {
              // menampilkan value 
              $('#tunjanganJab').val(data.tunjangan_jabatan);
              $('#tunjanganKel').val(data.tunjangan_keluarga);
              var hasil = (data.tunjangan_anak) * anak;
              $('#tunjanganAna').val(hasil);
              }
            });
          }
       } else {
          const id3 = (data.id_jabatan);
          $.ajax({
          url:'http://localhost/phpmvc/public/jabatan/tampilTunjanganJabatan',
          data: {id : id3},
          method: 'post',
          dataType: 'json',
          success: function(data) {
            // menampilkan value 
            $('#tunjanganJab').val(data.tunjangan_jabatan);
            $('#tunjanganKel').val('0');
            $('#tunjanganAna').val('0');
            }
          });
       }

     }
    });
  
  }
</script>