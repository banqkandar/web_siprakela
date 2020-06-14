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
                $id_pembimbing = $_SESSION['pembimbing'];
                $count = $con->query("SELECT count(*) FROM bimbing WHERE id_pembimbing = $id_pembimbing");
                $jumlah = mysqli_fetch_row($count);
                $hasil = $jumlah[0];
                ?>
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data user yang dibimbing</div>
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
          <h6 class="text-gray">Data user yang dibimbing</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama dan email</th>
                  <th>No Induk</th>
                  <th>Nama Instansi</th>
                  <th>Jurusan</th>
                  <th>Pendidikan</th>
                  <th>Akan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $id_pembimbing = $_SESSION['pembimbing'];
                $tampil = $con->query("SELECT * FROM bimbing JOIN user using(id_user) JOIN pengajuan using(id_pengajuan) JOIN jenis_penelitian using(id_penelitian) WHERE id_pembimbing = $id_pembimbing ");
                while ($isi = mysqli_fetch_assoc($tampil)) {
                  ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= ucwords($isi["nama"]); ?><br>
                    <span><?= ucwords($isi["email"]); ?> </span> 
                  </td>
                  <td><?= $isi["no_induk"]; ?> </td>
                  <td><?= ucwords($isi["kampus"]); ?> </td>
                  <td><?= ucwords($isi["jurusan"]); ?> </td>
                  <td><?= ucwords($isi["pendidikan"]); ?> </td>
                  <td><?= $isi["nama_penelitian"]; ?> </td>
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