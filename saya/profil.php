<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Profile</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="card-body shadow">
        <?php $username = $_SESSION['username'];
          $ambil = $con->query("SELECT * FROM user JOIN jenis_penelitian USING (id_penelitian) WHERE id_user = '$username'");
          $hasil = $ambil->fetch_assoc(); ?>
          <h4 class="font-weight-bold"><span class="text-black">Hai, <?= $hasil['nama_user']; ?></span></h4>
          <hr>
          No Induk <?= $hasil['no_induk']; ?><br>
          Saya sedang <?= $hasil['nama_penelitian']; ?> di Polrestabes Bandung<br>
          Saya dari <?= $hasil['instansi']; ?><br>
          Pendidikan sekarang <?= $hasil['pendidikan']; ?><br>
          Jurusan <?= $hasil['jurusan']; ?><br>
          Durasi Prakela selama <?= $hasil['durasi']; ?> Bulan<br>
          Username <?= $hasil['username']; ?><br>
          Password *************
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>