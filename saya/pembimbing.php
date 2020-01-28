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
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">List Pembimbing</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="row">
              <div class="col-md-12">
                <?php 
                $no=1;
                $username = $_SESSION['username'];
                $ambil      = $con->query("SELECT * FROM bimbing JOIN user using(id_user) JOIN pengajuan using(id_pengajuan) JOIN pembimbing using(id_pembimbing) WHERE id_user = $username ORDER BY id_user ASC");
                while ($isi = $ambil->fetch_assoc()) { ?>
                <div class="m-2">
                    <div class="card p-1">
                      <?= $no++; ?>. Dibimbing oleh <?= ucwords($isi['nama_pembimbing']); ?>
                      <a href="detail_pembimbing.php?id=<?= $isi['id_pembimbing']; ?>" class="fa-sm text-gray-600"><span class="badge badge-info">Lihat</span></a>
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