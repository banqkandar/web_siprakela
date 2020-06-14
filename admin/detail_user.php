<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
    
  </div>
  <div class="row">
    <?php
        $id_user = $_GET['id'];
        $ambil = $con->query("SELECT * FROM user JOIN pengajuan USING (id_pengajuan) JOIN jenis_penelitian USING (id_penelitian) WHERE id_user = $id_user");
        $isi = $ambil->fetch_assoc();
    ?>
    <div class="card shadow">
        <div class="card ">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama: <?= ucwords($isi['nama']); ?></li>
            <li class="list-group-item">No Induk: <?= $isi['no_induk']; ?></li>
            <li class="list-group-item">Email: <?= $isi['email']; ?></li>
            <li class="list-group-item">Nama Instansi: <?= ucwords($isi['kampus']); ?></li>
            <li class="list-group-item">Jurusan: <?= ucwords($isi['jurusan']); ?></li>
            <li class="list-group-item">Tingkat Pendidikan: <?= $isi['pendidikan']; ?></li>
            <li class="list-group-item">Sedang Melakukan: <?= $isi['nama_penelitian']; ?></li>
            <li class="list-group-item">Durasi: <?= $isi['durasi_penelitian']; ?> Bulan</li>
            <li class="list-group-item">Status: <?= $isi['status']; ?></li>
            <li class="list-group-item">
              <a href="hapus_user.php?id=<?= $isi['id_user']; ?>" class="fa-sm text-gray-600 float-right"
                          onclick="return confirm('Anda yakin akan menghapus data?')"><span class="btn btn-danger">Hapus</span></a>
              
            </li>
          </ul>
        </div>
      </div>
  </div>
</div>