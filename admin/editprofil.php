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
              $username_admin  = $_POST['username'];
              $nama      = $_POST['nama'];

              $update = "UPDATE admin SET nama_admin = '$nama', username_admin = '$username_admin' WHERE id_admin = '$admin'";
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
            $admin = $_SESSION['admin'];
            $tampil = $con->query("SELECT * FROM admin WHERE id_admin = '$admin'");
            $ambil = $tampil->fetch_assoc();
            ?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $ambil['username_admin'];?>" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $ambil['nama_admin'];?>" required>
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
                $admin     = $_SESSION['admin'];
                $pass_lama = $_POST['pass_lama'];
                $pass_baru = $_POST['pass_baru'];
                $encryptplama = password_hash($pass_lama, PASSWORD_DEFAULT);
                $encryptpbaru = password_hash($pass_baru, PASSWORD_DEFAULT);

                $cek_password = $con->query("SELECT * FROM admin WHERE id_admin ='$admin'");
                $cek = $cek_password->fetch_assoc();
                $admin_password = $cek['password_admin'];

                if(password_verify($pass_lama, $admin_password)){
                    $update = "UPDATE admin SET password_admin = '$encryptpbaru' WHERE id_admin = '$admin'";
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