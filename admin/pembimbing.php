<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="row">
      <div class="col-md-12">
        <h1 class="h4 mt-5 text-gray-800 ">Kelola Pembimbing</h1>
        <p class="subjudul">Informasi yang berkaitan dengan data pembimbing</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Tambah Pembimbing</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['tambah'])) {
              $nrp        = $_POST['nrp'];
              $nama       = $_POST['nama'];
              $no_telepon = $_POST['no_telepon'];
              $jabatan    = $_POST['jabatan'];
              $username   = $_POST['username'];
              $password   = $_POST['password'];
              $encrypt    = password_hash($password, PASSWORD_DEFAULT);
              $tambah     = "INSERT INTO pembimbing (id_pembimbing, nama_pembimbing, nrp_pembimbing, no_telepon, jabatan, username, password) VALUES (null, '$nama', '$nrp', '$no_telepon', '$jabatan', '$username', '$encrypt')";
              $masuk      = $con->query($tambah);
              if ($masuk) {
                echo '<div class="alert alert-success">Data berhasil ditambahkan.</div>';
                echo '<meta http-equiv="refresh" content="2; pembimbing.php "> ';
              } else {
                echo '<div class="alert alert-danger">Data gagal ditambahkan.</div>';
                echo '<meta http-equiv="refresh" content="2; pembimbing.php "> ';
              }
            }
            ?>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Adipati Dolken" required>
            </div>

            <div class="form-group">
              <label for="nrp">NRP</label>
              <input type="number" class="form-control" id="nrp" name="nrp" placeholder="42325262" size="8" required>
            </div>

            <div class="form-group">
              <label for="no_telepon">No Telepon</label>
              <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="08212264210" required>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Pembina" required>
            </div>

            <hr class="sidebar-divider">
            <h6 class="d-flex align-items-center justify-content-center">Buat akun</h6>
            <hr class="sidebar-divider">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-login">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data Pembimbing</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama dan <br> NRP Pembimbing</th>
                  <th>No Telepon</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM pembimbing ORDER BY id_pembimbing DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                ?>
                  <tr>
                    <td> <?= $no++; ?>.</td>
                    <td> <?= ucwords($isi["nama_pembimbing"]); ?><br><?= $isi['nrp_pembimbing']; ?></td>
                    <td> <?= $isi["no_telepon"]; ?></td>
                    <td> <?= $isi["jabatan"]; ?></td>
                    <td>
                      <a href="edit_pembimbing.php?id=<?= $isi['id_pembimbing']; ?>" class="text-gray-600"><span class="badge badge-info">Edit</span></a>
                      <a href="hapus_pembimbing.php?id=<?= $isi['id_pembimbing']; ?>" class="fa-sm text-gray-600" onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger">Hapus</span></a>
                      <a href="cetak_akun_pembimbing.php?id=<?= $isi['id_pembimbing']; ?>" target="_blank" class="text-gray-600"><span class="badge badge-warning">Cetak</span></a>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>