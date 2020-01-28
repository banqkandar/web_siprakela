<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
  </div>
  <a href="tambah_user.php" class="d-none d-sm-inline-block btn btn-md btn-secondary mb-2">Tambah User</a>
  <a href="bimbing.php" class="d-none d-sm-inline-block btn btn-md btn-secondary mb-2">Dibimbing Oleh</a>
  <div class="row">

    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data User<a href="cetak_data_user.php" target="_blank" class="ml-3 btn btn-sm float-right btn-light shadow-sm mr-2"><i class="fas fa-print fa-sm text-white-500"></i> Cetak Data User</a></h6>
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
                $tampil = $con->query("SELECT * FROM user JOIN pengajuan USING (id_pengajuan) JOIN jenis_penelitian USING (id_penelitian) ORDER BY id_user DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                ?>
                  <tr>
                    <td> <?= $no++; ?>.</td>
                    <td> <?= ucwords($isi["nama"]); ?></td>
                    <td> <?= $isi["no_induk"]; ?></td>
                    <td> <?= ucwords($isi["jurusan"]); ?></td>
                    <td> <?= $isi["nama_penelitian"]; ?></td>
                    <td> <?= $isi["durasi_penelitian"]; ?> Bulan</td>
                    <td>

                      <a href="edit_user.php?id=<?= $isi['id_user']; ?>" class="text-gray-600"><span class="badge badge-info">Edit</span></a>
                      <a href="detail_user.php?id=<?= $isi['id_user']; ?>" class="text-gray-600"><span class="badge badge-dark">Lihat</span></a>
                      <a href="cetak_akun_user.php?id=<?= $isi['id_user']; ?>" target="_blank" class="text-gray-600"><span class="badge badge-warning">Cetak</span></a>
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