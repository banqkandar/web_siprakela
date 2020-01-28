<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Edit Profile</h1>
      <p class="subjudul">Informasi ini berkaitan dengan edit profile</p>
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
              $nama       = $_POST['nama'];
              $username   = $_POST['username'];
              $nrp        = $_POST['nrp'];
              $no_telepon = $_POST['no_telepon'];
              $jabatan    = $_POST['jabatan'];

              $update =   "UPDATE pembimbing SET 
                            nama_pembimbing = '$nama' ,
                            nrp_pembimbing  = '$nrp' ,
                            no_telepon      = '$no_telepon' ,
                            jabatan         = '$jabatan' ,
                            username        = '$username'
                          WHERE
                              id_pembimbing = '$pembimbing' 
                          ;";
              $masuk  = $con->query($update); 
              if($masuk){
                echo '<div class="alert alert-success">Data profil berhasil diubah</div>';
                echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
              }else{
                echo '<div class="alert alert-danger">Data gagal diubah</div>';
                echo '<meta http-equiv="refresh" content="2; editprofil.php "> ';
              }
            }
            ?>
            <?php 
            $pembimbing = $_SESSION['pembimbing'];
            $tampil = $con->query("SELECT * FROM pembimbing WHERE id_pembimbing = '$pembimbing'");
            $ambil = $tampil->fetch_assoc();
            ?>

           <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= ucwords($ambil['nama_pembimbing']);?>" required>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= ucwords($ambil['username']);?>"
               required>
            </div>

            <div class="form-group">
              <label for="nrp">NRP Pembimbing</label>
              <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $ambil['nrp_pembimbing'];?>"
                required>
            </div>

            <div class="form-group">
              <label for="no_telepon">No Telepon</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $ambil['no_telepon'];?>"
                required>
            </div>

            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= ucwords($ambil['jabatan']);?>"
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
                $pembimbing = $_SESSION['pembimbing'];
                $pass_lama = $_POST['pass_lama'];
                $pass_baru = $_POST['pass_baru'];
                $encryptplama = password_hash($pass_lama, PASSWORD_DEFAULT);
                $encryptpbaru = password_hash($pass_baru, PASSWORD_DEFAULT);

                $cek_password = $con->query("SELECT * FROM pembimbing WHERE id_pembimbing ='$pembimbing'");
                $cek = $cek_password->fetch_assoc();
                $user_password = $cek['password'];

                if(password_verify($pass_lama, $user_password)){
                    $update = "UPDATE pembimbing SET password = '$encryptpbaru' WHERE id_pembimbing = '$pembimbing'";
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