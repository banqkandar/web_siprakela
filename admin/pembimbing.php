<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Pembimbing</h1>
    <!-- <a href="tambah_pembimbing.php" class="mt-5 d-none d-sm-inline-block btn btn-md btn-light">Tambah Pembimbing</a> -->
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
              $tambah     = "INSERT INTO pembimbing (id_pembimbing, nama_pembimbing, nrp_pembimbing, no_telepon, jabatan) VALUES (null, '$nama', '$nrp', '$no_telepon', '$jabatan')";
              $masuk      = $con->query($tambah);
              if ($masuk) {
                echo '<div class="alert alert-success">Berhasil.</div>';
                echo '<meta http-equiv="refresh" content="2; pembimbing.php "> ';
              } else {
                echo '<div class="alert alert-danger">Gagal.</div>';
                echo '<meta http-equiv="refresh" content="2; pembimbing.php "> ';
              }
            }
            ?>
            <div class="form-group">
              <label for="nrp">NRP</label>
              <input type="number" class="form-control" id="nrp" name="nrp" placeholder="cth: 123123324234" autofocus
                required>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="cth: Soleh Solihun" required>
            </div>

            <div class="form-group">
              <label for="no_telepon">No Telepon</label>
              <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                placeholder="cth: Soleh Solihun" required>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="cth: " required>
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
            <div class="row">
              <?php
              $tampil = $con->query("SELECT * FROM pembimbing ORDER BY id_pembimbing DESC");
              while ($isi = mysqli_fetch_assoc($tampil)) {
              ?>

              <div class="card shadow ml-3 mb-4">
                <div class="card-body">
                  <h5 class="card-title"><?= $isi['nama_pembimbing']; ?></h5>
                  <p class="card-text"><?= $isi['nrp_pembimbing']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?= $isi['no_telepon']; ?></li>
                  <li class="list-group-item"><?= $isi['jabatan']; ?></li>
                </ul>
                <div class="card-body">
                  <a href="hapus_pembimbing.php?id=<?= $isi['id_pembimbing']; ?>" class="fa-sm text-gray-600"
                  onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger">Hapus</span></a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>