<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Edit Profile</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Info Akun</h6>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php
            if (isset($_POST['update'])) {
              $nama          = $_POST['nama'];
              $instansi      = $_POST['instansi'];
              $noinduk       = $_POST['noinduk'];
              $jurusan       = $_POST['jurusan'];

              $update = "UPDATE user SET nama_user='$nama', no_induk='$noinduk' , instansi='$instansi', jurusan = '$jurusan' WHERE id_user = '$username'";
              $masuk  = $con->query($update); 
              if($masuk){
                echo '<div class="alert alert-success">Berhasil update.</div>';
                echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
              }else{
                echo '<div class="alert alert-danger">gagal.</div>';
                echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
              }
            }
            ?>
            <?php 
            $username = $_SESSION['username'];
            $tampil = $con->query("SELECT * FROM user WHERE id_user = '$username'");
            $ambil = $tampil->fetch_assoc();
            ?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $ambil['username'];?>"
               required disabled>
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $ambil['nama_user'];?>" required>
            </div>
            <div class="form-group">
              <label for="instansi">Instansi</label>
              <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $ambil['instansi'];?>" required>
            </div>
            <div class="form-group">
              <label for="noinduk">No Induk</label>
              <input type="number" class="form-control" id="noinduk" name="noinduk" value="<?= $ambil['no_induk'];?>"
                required>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $ambil['jurusan'];?>"
                required>
            </div>

            <button type="submit" name="update" class="btn btn-login">Update Data</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Ganti Password</h6>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php 
            if($_POST['pass_lama']){
                $username = $_SESSION['username'];
                $pass_lama = $_POST['pass_lama'];
                $pass_baru = $_POST['pass_baru'];
                $encryptplama = password_hash($pass_lama, PASSWORD_DEFAULT);
                $encryptpbaru = password_hash($pass_baru, PASSWORD_DEFAULT);

                $cek_password = $con->query("SELECT * FROM user WHERE id_user ='$username'");
                $cek = $cek_password->fetch_assoc();
                $user_password = $cek['password'];

                if(password_verify($pass_lama, $user_password)){
                    $update = "UPDATE user SET password = '$encryptpbaru' WHERE id_user = '$username'";
                    $masuk  = $con->query($update); 
                  if($masuk){
                    echo '<div class="alert alert-success">Berhasil update, password baru anda : '.$pass_baru.'</div>';
                    echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
                  }else{
                    echo '<div class="alert alert-danger">gagal.</div>';
                    echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
                  }
                }
            }
            ?>
            <div class="form-group">
              <label for="pass_lama">Password Lama</label>
              <input type="password" class="form-control" id="pass_lama" name="pass_lama"
               required>
            </div>
            <div class="form-group">
              <label for="pass_baru">Password Baru</label>
              <input type="password" class="form-control" id="pass_baru" name="pass_baru"
               required>
            </div>

            <button type="submit" class="btn btn-login">Ganti Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php include 'footer.php'; ?>