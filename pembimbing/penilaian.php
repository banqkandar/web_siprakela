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
              $user     = $_POST['user'];
              $idinstansi = '1';
              $a1         = $_POST['a1'];
              $a2         = $_POST['a2'];
              $a3         = $_POST['a3'];
              $a4         = $_POST['a4'];
              $a5         = $_POST['a5'];

              $cek        = $con->query("SELECT * FROM penilaian WHERE id_user ='$user'");
              $hasil      = $cek->fetch_array();

              if ($hasil) {
                  echo '<div class="alert alert-danger">Nilai user telah dibuat</div>';
                  echo '<meta http-equiv="refresh" content="2; penilaian.php "> ';
              } else { 
                $tambah = "INSERT INTO penilaian (id_nilai, id_user, id_instansi, a1, a2, a3, a4, a5) VALUES (null,'$user','$idinstansi','$a1','$a2','$a3', '$a4', '$a5')";
                $masuk  = $con->query($tambah); 
                if($masuk){
                    echo '<div class="alert alert-success">Data penilaian berhasil dibuat</div>';
                    echo '<meta http-equiv="refresh" content="2; penilaian.php "> ';
                }else{
                    echo '<div class="alert alert-danger">Gagal, ada yang salah</div>';
                    echo '<meta http-equiv="refresh" content="2; penilaian.php "> ';
                }
              }
            }
            ?>
            
            <div class="form-group">
              <label>Pilih User</label>
              <select name="user" class="form-control" required>
                <option value="">Pilih user</option>
                <?php
                  $tampil = $con->query("SELECT * FROM bimbing JOIN user using(id_user) JOIN pengajuan using(id_pengajuan) WHERE id_pembimbing = $pembimbing");
                  while ($r = mysqli_fetch_assoc($tampil)) {
                      echo '<option value="' . $r['id_user'] . '" >' . ucwords($r['nama']) . ' - ' . $r['email'] . '</option>';
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
                    <th>Nama dan <br>No Induk</th>
                    <th>Email</th>
                    <th>Cetak</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM penilaian JOIN user USING (id_user) JOIN pengajuan USING (id_pengajuan) ORDER BY id_nilai DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                  <tr>
                    <td> <?= $no++; ?>.</td>
                    <td> <?= ucwords($isi["nama"]); ?><br>
                         <?= $isi["no_induk"]; ?></td>
                    <td> <?= $isi["email"]; ?></td>
                    <td>
                      <a href="cetak_nilai.php?id=<?= $isi['id_nilai']; ?>"  target="_blank" class="fa-sm text-gray-600"><span class="badge badge-dark">Cetak Nilai</span></a>
                      <a href="hapus_nilai.php?id=<?= $isi['id_nilai']; ?>" class="fa-sm text-gray-600" onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger">Hapus</span></a>
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