<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Penilaian</h1>
      <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-5">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Penilaian</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['tambah'])){
                $iduser     = $_POST['iduser'];
                $idinstansi = '1';
                $a1         = $_POST['a1'];
                $a2         = $_POST['a2'];
                $a3         = $_POST['a3'];
                $a4         = $_POST['a4'];
                $a5         = $_POST['a5'];
                $tambah = "INSERT INTO penilaian (id_nilai, id_user, id_instansi, a1, a2, a3, a4, a5) VALUES (null,'$iduser','$idinstansi','$a1','$a2','$a3', '$a4', '$a5')";
                $masuk  = $con->query($tambah); 
                if($masuk){
                    echo '<div class="alert alert-success">Berhasil.</div>';
                    echo '<meta http-equiv="refresh" content="2; penilaian.php "> ';
                }else{
                    echo '<div class="alert alert-danger">Gagal.</div>';
                    echo '<meta http-equiv="refresh" content="2; penilaian.php "> ';
                }
            }
            ?>
            <div class="form-group">
              <label>Pilih User</label>
              <select name="iduser" class="form-control" required>
                <option value="">Pilih user</option>
                <?php
                  $tampil = $con->query("SELECT id_user , nama_user  FROM user");
                  while ($r = mysqli_fetch_assoc($tampil)) {
                      echo '<option value="' . $r[id_user] . '" >' . $r[nama_user] . '</option>';
                  }
                  ?>
              </select>
            </div>
            <input type="hidden" class="form-control" name="idinstansi">
            <div class="form-group mb-4">
              <label for="a1" class="mr-2">1. Disipin Dalam Bekerja</label>
              <input type="text" class="form-control float-right" id="a1" name="a1" required
                style="width: 20%">
            </div>
            <div class="form-group mb-4">
              <label for="a2" class="mr-2">2. Kemampuan Menyelesaikan Tugas</label>
              <input type="text" class="form-control float-right" id="a2" name="a2" required
                style="width: 20%">
            </div>
            <div class="form-group mb-4">
              <label for="a3" class="mr-2">3. Prestasi Kerja</label>
              <input type="text" class="form-control float-right" id="a3" name="a3" required
                style="width: 20%">
            </div>
              <div class="form-group mb-4">
                <label for="a4" class="mr-2">4. Inisiatif</label>
                <input type="text" class="form-control float-right" id="a4" name="a4" required
                  style="width: 20%">
              </div>
              <div class="form-group mb-4">
                <label for="a5" class="mr-2">5. Kepribadian</label>
                <input type="text" class="form-control float-right" id="a5" name="a5" required
                  style="width: 20%">
              </div>

              <button type="submit" name="tambah" class="btn btn-login">Buat Penilaian</button>
          </form>
            </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="card mb-4">
          <div class="card-header">
            <h6 class="text-gray">Data User</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No induk</th>
                    <th>Cetak</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM penilaian JOIN user USING (id_user) ORDER BY id_nilai DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                  <tr>
                    <td> <?= $no++; ?>.</td>
                    <td> <?= $isi["nama_user"]; ?></td>
                    <td> <?= $isi["no_induk"]; ?></td>
                    <td>
                      <a href="cetak_nilai.php?id=<?= $isi['id_nilai']; ?>"  target="_blank" class="fa-sm text-gray-600"><span class="badge badge-dark">Cetak Nilai</span></a>
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
  <?php include 'footer.php'; ?>