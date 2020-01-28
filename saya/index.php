<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Absen</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
        <div class="card mb-4">
          <div class="card-body shadow">
            <h4>Jam</h4>
          <div class="kotak">
            <p id="jam"></p>
          </div>
          <div class="kotak">
            <p id="menit"></p>
          </div>
          <div class="kotak">
            <p id="detik"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Absen Masuk</h6>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php
            if (isset($_POST['absen_masuk'])) {
              $tanggal        = date("Y-m-d");
              date_default_timezone_set('Asia/Jakarta');
              $jam_masuk      = date("H:i:s");

              $cek      = $con->query("SELECT * FROM absen WHERE id_user ='$username' AND tanggal_absen = '$tanggal' AND (status_masuk='telah absen' OR status_masuk='menunggu konfirmasi')");
              $hasil    = $cek->fetch_array();

              if ($hasil) {
                  echo '
                        <script>
                            window.alert("Anda telah absen hari ini, tidak boleh absen 2x");
                            window.location = "index.php";
                        </script>
                    ';
              } else {
                $tambah = "INSERT INTO absen (id_absen, id_user, tanggal_absen, jam_masuk, status_masuk, tanggal_acc) VALUES (null,'$username','$tanggal','$jam_masuk','menunggu konfirmasi','')";
                $masuk  = $con->query($tambah); 
                if($masuk){
                  echo '<div class="alert alert-success">Tunggu konfirmasi admin.</div>';
                  echo '<meta http-equiv="refresh" content="2; index.php "> ';
                }else{
                  echo '<div class="alert alert-danger">gagal.</div>';
                  echo '<meta http-equiv="refresh" content="2; index.php "> ';
                }
              }
            }
            ?>
            <?php 
            $username = $_SESSION['username'];
            $ambil = $con->query("SELECT * FROM absen WHERE id_user = '$username' ORDER BY id_absen DESC");
            $isi = $ambil->fetch_array();
            ?>
            <?php if(date('Y-m-d') != $isi['tanggal_absen']) {  ?>
            <h1 class="h6">
              <div class="alert alert-danger" role="alert">
                Anda belum absen masuk hari ini, silahkan absen sekarang
              </div>
            </h1>
            <?php } else { ?>
            <h1 class="h6">
              <div class="alert alert-success" role="alert">
              Anda <?= $isi['status_masuk']; ?>. Silahkan cek absen anda <a href="absenku.php" class="alert-link">ABSENSIKU</a>.
              </div>
              
            </h1>
            <?php }?>
                <button type="submit" class="btn btn-login" name="absen_masuk" >Absen Sekarang</button>
          </form>
        </div>
      </div>
    </div>

</div>

<script>
  window.setTimeout("waktu()", 1000);

  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = waktu.getHours();
    document.getElementById("menit").innerHTML = waktu.getMinutes();
    document.getElementById("detik").innerHTML = waktu.getSeconds();
  }
</script>

<?php include 'footer.php'; ?>