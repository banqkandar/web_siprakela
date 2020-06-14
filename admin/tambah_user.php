<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
  </div>
  <div class="row">

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Tambah User</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['tambah'])){
                $id_pengajuan  = $_POST['id_pengajuan'];
                $noinduk       = $_POST['noinduk'];
                $jurusan       = $_POST['jurusan'];
                $pendidikan    = $_POST['pendidikan'];
                $username      = $_POST['username'];
                $password      = $_POST['password'];
                $encrypt       = password_hash($password, PASSWORD_DEFAULT);

                $cek      = $con->query("SELECT * FROM user WHERE id_pengajuan ='$id_pengajuan'");
                $hasil    = $cek->fetch_array();

                if ($hasil) {
                    echo '<div class="alert alert-danger">Data penambahan user tidak boleh sama dengan yang sudah ada </div>';
                    echo '<meta http-equiv="refresh" content="2; tambah_user.php "> ';
                } else { 
                      $tambah = "INSERT INTO user (id_user, id_pengajuan, no_induk, jurusan, pendidikan, username, password) VALUES (null, '$id_pengajuan', '$noinduk', '$jurusan', '$pendidikan', '$username', '$encrypt')";
                      $masuk  = $con->query($tambah); 
                  if($masuk){
                      echo '<div class="alert alert-success">Data user berhasil ditambahkan</div>';
                      echo '<meta http-equiv="refresh" content="2; user.php "> ';
                  }else{
                      echo '<div class="alert alert-danger">Data gagal ditambahkan</div>';
                      echo '<meta http-equiv="refresh" content="2; tambah_user.php "> ';
                  }
                }
            }
            ?>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <select name="id_pengajuan" class="form-control" required>
                <option value="">Pilih nama dan email</option>
                <?php
                  $tampil = $con->query("SELECT id_pengajuan, nama, email  FROM pengajuan WHERE status='Diterima'");
                  while ($r = mysqli_fetch_assoc($tampil)) {
                      echo '<option value="' . $r['id_pengajuan'] . '" >' . ucwords($r['nama']) . ' - ' . $r['email'] . '</option>';
                  }
                  ?>
              </select>
            </div>

            <div class="form-group">
              <label for="noinduk">No Induk</label>
              <input type="number" class="form-control" id="noinduk" name="noinduk" placeholder="10116121"
                required>
            </div>

            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jaringan Komputer"
                required>
            </div>

            <div class="form-group">
              <label>Pendidikan</label>
              <select name="pendidikan" class="form-control" required>
                <option value="">Pilih pendidikan</option>
                <option value="sma">SMA</option>
                <option value="smk">SMK</option>
                <option value="s1">Strata 1</option>
                <option value="d3">Diploma 3</option>
              </select>
            </div>

            <hr class="sidebar-divider">
            <h6 class="d-flex align-items-center justify-content-center">Buat akun</h6>
            <hr class="sidebar-divider">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="bangkandar" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-login">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>