<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Absen</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data Absen User</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Lengkap</th>
                  <th>Jam Masuk</th>
                  <th>Status Masuk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM absen JOIN user USING (id_user) JOIN pengajuan USING (id_pengajuan) ORDER BY tanggal_absen DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                <tr>
                  <td> <?= $no++; ?>.</td>
                  <td>
                      <?php
                      $date = date_create($isi['tanggal_absen']);
                      echo date_format($date, "l, d F Y");?>
                  </td>
                  <td> <?= ucwords($isi["nama"]); ?></td>
                  <td>
                      <?php
                      $date = date_create($isi['jam_masuk']);
                      echo date_format($date, "H:i");?>
                  </td>
                  <td> <?= ucwords($isi["status_masuk"]); ?></td>
                  <td>
                    <?php
                  if ($isi['status_masuk'] == 'menunggu konfirmasi') {  ?>
                    <a href="konfirmasi_masuk.php?id=<?= $isi['id_absen']; ?>" class="fa-sm text-gray-600"
                      onclick="return confirm('Konfirmasi absen ini??')"><span class="badge badge-secondary">Konfirmasi masuk</span></a>
                      <?php
                      } else {   
                        ?>
                    <a class="fa-sm text-gray-600"> <span class="badge badge-success">Telah dikonfirmasi</span></a>
                    <a href="hapus_absen.php?id=<?= $isi['id_absen']; ?>" class="fa-sm text-gray-600"
                      onclick="return confirm('Apakah anda yakin menghapus absen yang ini??')"><span class="badge badge-danger">Hapus</span></a>
                    <?php
                      } 
                      ?>
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


</div>
<?php include 'footer.php'; ?>