<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
    <a href="user.php" class="mt-5 d-none d-sm-inline-block btn btn-md btn-light">Kembali</a>
  </div>
  <div class="row">
    <?php
        $id_user = $_GET['id'];
        $ambil = $con->query("SELECT * FROM user where id_user = '$id_user' ");
        $hasil = $ambil->fetch_assoc();
    ?>
    <div class="card shadow">
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $hasil['nama_user']; ?></h5>
                <p class="card-text"><?= $hasil['no_induk']; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $hasil['instansi']; ?></li>
                <li class="list-group-item"><?= $hasil['jurusan']; ?></li>
                <li class="list-group-item">Selama <?= $hasil['durasi']; ?> Bulan</li>
                <li class="list-group-item">username(<?= $hasil['username']; ?>)</li>
            </ul>
        </div>
    </div>
  </div>
</div>