<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Pembimbing</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
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