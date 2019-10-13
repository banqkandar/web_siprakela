<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
    <a href="user.php" class="mt-5 d-none d-sm-inline-block btn btn-md btn-light">Kembali</a>
  </div>
  <div class="row">

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Generate Username dan Password</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="cth: Justin Bieber" autofocus
                required>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="**************" required>
            </div>

            <button type="submit" name="generate" class="btn btn-login">Generate</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Tambah User Penelitian</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['tambah'])){
                $nama          = $_POST['nama'];
                $instansi      = $_POST['instansi'];
                $idpenelitian  = $_POST['idpenelitian'];
                $noinduk       = $_POST['noinduk'];
                $jurusan       = $_POST['jurusan'];
                $pendidikan    = $_POST['pendidikan'];
                $durasi        = $_POST['durasi'];
                $username      = $_POST['username'];
                $password      = $_POST['password'];
                $encrypt       = password_hash($password, PASSWORD_DEFAULT);
                $tambah = "INSERT INTO user (id_user, nama_user, instansi, id_penelitian, no_induk, jurusan, pendidikan, durasi, username, password) VALUES (null,'$nama','$instansi','$idpenelitian','$noinduk','$jurusan', '$pendidikan', '$durasi', '$username', '$encrypt')";
                $masuk  = $con->query($tambah); 
                if($masuk){
                    echo '<div class="alert alert-success">Berhasil.</div>';
                    echo '<meta http-equiv="refresh" content="2; user.php "> ';
                }else{
                    echo '<div class="alert alert-danger">Gagal.</div>';
                    echo '<meta http-equiv="refresh" content="2; tambah_user.php "> ';
                }
            }
            ?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="cth: Justin Bieber"
                autofocus required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="cth: Justin Bieber" required>
            </div>
            <div class="form-group">
              <label for="instansi">Instansi</label>
              <input type="text" class="form-control" id="instansi" name="instansi" placeholder="cth: UNIKOM" required>
            </div>
            <div class="form-group">
              <label>Sedang Penelitian</label>
              <select name="idpenelitian" class="form-control" required>
                <option value="">Pilih penelitian</option>
                <?php
                  $tampil = $con->query("SELECT id_penelitian , nama_penelitian  FROM jenis_penelitian");
                  while ($r = mysqli_fetch_assoc($tampil)) {
                      echo '<option value="' . $r[id_penelitian] . '" >' . $r[nama_penelitian] . '</option>';
                  }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="noinduk">No Induk</label>
              <input type="number" class="form-control" id="noinduk" name="noinduk" placeholder="cth: 10116121"
                required>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="cth: Teknik Informatika"
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
            <div class="form-group">
              <label>Durasi</label>
              <select name="durasi" class="form-control" required>
                <option value="">Berapa lama</option>
                <option value="1">1 Bulan</option>
                <option value="2">2 Bulan</option>
                <option value="3">3 Bulan</option>
                <option value="4">4 Bulan</option>
                <option value="5">5 Bulan</option>
                <option value="6">6 Bulan</option>
              </select>
            </div>

            <button type="submit" name="tambah" class="btn btn-login">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>