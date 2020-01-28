<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Kelola Data Tempat pengajuan</h1>
      <p class="subjudul">Informasi yang berkaitan dengan data tempat pengajuan</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
            <h6 class="text-gray">Tambah Jenis Penelitian</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
            <?php
            if (isset($_POST['tambah'])) {
                $penelitian = $_POST['penelitian'];
                $des_penelitian = $_POST['des_penelitian'];
                $durasi_penelitian = $_POST['durasi_penelitian'];

                $tambah = "INSERT INTO jenis_penelitian VALUES(null,'$penelitian','$des_penelitian','$durasi_penelitian')";
                $masuk = $con->query($tambah);
                if ($masuk) {
                echo '<div class="alert alert-success">Berhasil ditambahkan.</div>';
                echo '<meta http-equiv="refresh" content="2; pengajuan.php "> ';
              } else {
                echo '<div class="alert alert-danger">Gagal.</div>';
                echo '<meta http-equiv="refresh" content="2; pengajuan.php "> ';
                }
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" id="penelitian" name="penelitian"
                placeholder="Magang">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="des_penelitian" name="des_penelitian"
                placeholder="Deskripsi">
            </div>

            <div class="form-group">
              <div class="col-xs-2">
                <input type="number" class="form-control" id="durasi_penelitian" size="4" maxlength="4"" name="durasi_penelitian"
                placeholder="1 Bulan">
              </div>
            </div>

            <button type="submit" name="tambah" class="btn btn-login">Tambah Data</button>
            </form>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">
            <h6 class="text-gray">Data Jenis Penelitian</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Durasi</th>
                  <th>Hapus </th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              $tampil = $con->query("Select * from jenis_penelitian");
              while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $isi["nama_penelitian"]; ?></td>
                <td><?= $isi["deskripsi"]; ?></td>
                <td><?= $isi["durasi_penelitian"]; ?> Bulan</td>
                <td>
                <a href="hapus_penelitian.php?id=<?= $isi['id_penelitian']; ?>" class="fa-sm text-gray-600"
                    onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger"><i
                    class="fa fa-trash fa-sm"></i> hapus</span></a>
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
    <!-- akhir row atas -->
  </div> 
  
  <?php include 'footer.php'; ?>