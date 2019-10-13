<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
    <a href="tambah_user.php" class="mt-5 d-none d-sm-inline-block btn btn-md btn-light">Tambah User</a>
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data User Penelitian</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>No Induk</th>
                  <th>Jurusan</th>
                  <th>Sedang Penelitian</th>
                  <th>Durasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM user JOIN jenis_penelitian USING (id_penelitian) ORDER BY nama_user ASC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                <tr>
                  <td> <?= $no++; ?></td>
                  <td> <?= $isi["nama_user"]; ?></td>
                  <td> <?= $isi["no_induk"]; ?></td>
                  <td> <?= $isi["jurusan"]; ?></td>
                  <td> <?= $isi["nama_penelitian"]; ?></td>
                  <td> <?= $isi["durasi"];?> Bulan</td>
                  <td>
                  <a href="detail_user.php?id=<?= $isi['id_user']; ?>" class="text-gray-600">Lihat</a>
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
<?php include 'footer.php'; ?>