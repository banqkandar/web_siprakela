<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800 ">Dashboard</h1>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="index.php" style="text-decoration: none;">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <?php
                $count_masuk = $con->query("SELECT count(*) FROM pengajuan WHERE status='belum diterima'");
                $jumlah = mysqli_fetch_row($count_masuk);
                $hasil = $jumlah[0];
                ?>
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data yang masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hasil; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <a href="pengajuan_diterima.php" style="text-decoration: none;">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <?php
                  $count_terima = $con->query("SELECT count(*) FROM pengajuan WHERE status='diterima'");
                  $jumlah = mysqli_fetch_row($count_terima);
                  $hasil = $jumlah[0];
                ?>
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data yang telah diterima</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hasil; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <a href="pengajuan_ditolak.php" style="text-decoration: none;">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <?php
                  $count_terima = $con->query("SELECT count(*) FROM pengajuan WHERE status='tidak diterima'");
                  $jumlah = mysqli_fetch_row($count_terima);
                  $hasil = $jumlah[0];
                ?>
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data yang ditolak</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hasil; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data pengajuan yang masuk</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama dan email</th>
                  <th>Nama Instansi</th>
                  <th>Akan</th>
                  <th>Surat lamaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM pengajuan join jenis_penelitian using(id_penelitian) WHERE status='belum diterima' ORDER BY id_pengajuan DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {
                  ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= $isi["nama"]; ?><br>
                      <span><?= $isi["email"]; ?> </span> 
                  </td>
                  <td><?= $isi["kampus"]; ?> </td>
                  <td><?= $isi["nama_penelitian"]; ?> </td>
                  <td>
                    <a href="download_surat.php?filename=<?= $isi["surat_lamaran"]; ?>" class="fa-sm text-gray-600"><i class="fa fa-download"></i> Unduh surat disini </a> 
                  </td>
                  <td>
                    <a href="balas_pengajuan.php?id=<?= $isi['id_pengajuan']; ?>" class="text-gray-600"><span class="badge badge-light">balas</span></a>
                    <a href="hapus_pengajuan.php?id=<?= $isi['id_pengajuan']; ?>" class="fa-sm text-gray-600"
                      onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger">Hapus</span></a>
                    <a href="terima_pengajuan.php?id=<?= $isi['id_pengajuan']; ?>" class="text-gray-600"><span class="badge badge-success">terima</span></a>
                    <a href="tolak_pengajuan.php?id=<?= $isi['id_pengajuan']; ?>" class="text-gray-600"><span class="badge badge-secondary">tolak</span></a>
                  </td>
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