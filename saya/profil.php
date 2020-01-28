<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<?php
function my_simple_crypt( $string, $action = 'd' ) {
  // you may change these values to your own
  $secret_key = 'my_simple_secret_key';
  $secret_iv = 'my_simple_secret_iv';

  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

  if( $action == 'e' ) {
      $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }
  else if( $action == 'd' ){
      $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }

  return $output;
}
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Profile</h1>
      <p class="subjudul">Informasi ini berkaitan dengan data profil saya</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="card-body shadow">
        <?php $username = $_SESSION['username'];
          $ambil = $con->query("SELECT * FROM user JOIN pengajuan USING (id_pengajuan) JOIN jenis_penelitian USING (id_penelitian) WHERE id_user = '$username'");
          $hasil = $ambil->fetch_assoc(); ?>
          <h4 class="font-weight-bold"><span class="text-black">Hai, <?= ucwords($hasil['nama']); ?></span></h4>
          <hr>
          No Induk <?= $hasil['no_induk']; ?><br>
          Email <?= $hasil['email']; ?><br>
          Saya dari <?= $hasil['kampus']; ?><br>
          Pendidikan sekarang <?= ucwords($hasil['pendidikan']); ?><br>
          Jurusan <?= $hasil['jurusan']; ?><br>
          Durasi Prakela selama <?= $hasil['durasi_penelitian']; ?> Bulan<br>
          Surat lamaran <a href="download_surat.php?filename=<?= $hasil["surat_lamaran"]; ?>" style="text-decoration:none"><i class="fa fa-download"></i> Download di sini</a><br>
          <hr class="sidebar-divider">
          <p class="">Akun saya</>
          <hr class="sidebar-divider">
          Username <?= $hasil['username']; ?><br>
          Password <?php 
                      $decrypted = my_simple_crypt( $hasil['password'], 'd' );
                      echo $decrypted; ?>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>