<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Pembimbing</h1>
      <p class="subjudul">Informasi ini berkaitan dengan data pembimbing</p>
    </div>
  </div>
  <div class="row">
    <?php
        $id_pembimbing = $_GET['id'];
        $ambil = $con->query("SELECT * FROM pembimbing WHERE id_pembimbing = $id_pembimbing");
        $isi = $ambil->fetch_assoc();
    ?>
    <div class="card shadow">
        <div class="card ">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama Pembimbing: <?= ucwords($isi['nama_pembimbing']); ?></li>
            <li class="list-group-item">NRP Pembimbing: <?= $isi['nrp_pembimbing']; ?></li>
            <li class="list-group-item">No Telepon: <?= $isi['no_telepon']; ?></li>
            <li class="list-group-item">Jabatan: <?= ucwords($isi['jabatan']); ?></li>
          </ul>
        </div>
      </div>
  </div>
</div>
<?php include 'footer.php'; ?>