<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800 ">Kelola Info</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-pengajuan-tab" data-toggle="tab" href="#nav-pengajuan" role="tab"
            aria-controls="nav-pengajuan" aria-selected="true">Pengajuan Tempat</a>
          <a class="nav-item nav-link" id="nav-instansi-tab" data-toggle="tab" href="#nav-instansi" role="tab"
            aria-controls="nav-instansi" aria-selected="false">Setting Instansi</a>
          <a class="nav-item nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab"
            aria-controls="nav-admin" aria-selected="false">Setting Admin</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-pengajuan" role="tabpanel" aria-labelledby="nav-pengajuan-tab">

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Data Pengajuan(User yang mengajukan tempat penelitian)</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th width="4%">Email</th>
                          <th>Instansi</th>
                          <th>Akan Melakukan</th>
                          <th>Dibagian</th>
                          <th>tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $tampil = $con->query("SELECT * FROM pengajuan join jenis_penelitian using(id_penelitian) join bagian using(id_bagian) ORDER BY id_pengajuan DESC ");
                        while ($isi = mysqli_fetch_assoc($tampil)) {

                          ?>
                        <tr>
                          <td><?= $no++; ?>.</td>
                          <td><?= $isi["email"]; ?></td>
                          <td><?= $isi["kampus"]; ?> </td>
                          <td><?= $isi["nama_penelitian"]; ?> </td>
                          <td><?= $isi["nama_bagian"]; ?> </td>
                          <td>
                            <?php
                            $date = date_create($isi["tanggal"]);
                            echo date_format($date, "d F, H:i");
                          ?>
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
                      $tambah = "INSERT INTO jenis_penelitian VALUES(null,'$penelitian')";
                      $masuk = $con->query($tambah);
                      if ($masuk) {
                        echo '<div class="alert alert-success">Berhasil.</div>';
                        echo '<meta http-equiv="refresh" content="2; index.php "> ';
                      } else {
                        echo '<div class="alert alert-danger">Gagal.</div>';
                      }
                    }
                    ?>
                    <div class="form-group">
                      <input type="text" class="form-control" id="penelitian" name="penelitian"
                        placeholder="cth: Magang">
                    </div>

                    <button type="submit" name="tambah" class="btn btn-login">Tambah Data</button>
                  </form>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Tambah Bagian</h6>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <?php
                    if (isset($_POST['simpan'])) {
                      $bagian = $_POST['bagian'];
                      $tambah = "INSERT INTO bagian VALUES(null,'$bagian')";
                      $masuk = $con->query($tambah);
                      if ($masuk) {
                        echo '<div class="alert alert-success">Berhasil.</div>';
                        echo '<meta http-equiv="refresh" content="2; index.php "> ';
                      } else {
                        echo '<div class="alert alert-danger">Gagal.</div>';
                        echo '<meta http-equiv="refresh" content="2; index.php "> ';
                      }
                    }
                    ?>
                    <div class="form-group">
                      <input type="text" class="form-control" id="bagian" name="bagian" placeholder="cth: bin ops">
                    </div>

                    <button type="submit" name="simpan" class="btn btn-login">Tambah Data</button>
                  </form>
                </div>
              </div>

            </div>

            <div class="col-md-4">
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
                          <td>
                          <a href="hapus_penelitian.php?id=<?= $isi['id_penelitian']; ?>" class="fa-sm text-gray-600"
                              onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger"><i
                                class="fa fa-trash fa-sm"></i></span></a>
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

            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Data Bagian</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $tampil = $con->query("Select * from bagian");
                        while ($isi = mysqli_fetch_assoc($tampil)) {

                          ?>
                        <tr>
                          <td><?= $no++; ?>.</td>
                          <td><?= $isi["nama_bagian"]; ?></td>
                          <td>
                          <a href="hapus_bagian.php?id=<?= $isi['id_bagian']; ?>" class="fa-sm text-gray-600"
                              onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger"><i
                                class="fa fa-trash fa-sm"></i></span></a>
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


        <div class="tab-pane fade" id="nav-instansi" role="tabpanel" aria-labelledby="nav-instansi-tab">
          <div class="row mt-3">
            <div class="col-md-5">
              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Edit Instansi</h6>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['tekan'])) {
                      $nama_instansi    = $_POST['nama_instansi'];
                      $alamat_instansi  = $_POST['alamat_instansi'];
                      $pimpinan         = $_POST['pimpinan'];
                      $nrp              = $_POST['nrp'];
                      $website          = $_POST['website'];
                      $namalama = $_POST['namalama'];


                      $yang_boleh = array('png', 'jpg', 'jpeg');
                      $nama       = $_FILES['gambar']['name'];
                      $x          = explode('.', $nama);
                      $ekstensi   = strtolower(end($x));
                      $ukuran     = $_FILES['gambar']['size'];
                      $file_tmp   = $_FILES['gambar']['tmp_name'];
                      $namabaru = date('dmYHis') . $nama;

                      if(empty($nama)){
                          $ubah  = $con->query("UPDATE instansi SET 
                              nama_instansi   = '$nama_instansi', 
                              alamat     = '$alamat_instansi', 
                              nama_pimpinan = '$pimpinan',
                              nrp_pimpinan = '$nrp', 
                              website = '$website'
                              ");
                          if($ubah){
                              echo '<div class="alert alert-success">Berhasil.</div>';
                              echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                            } else {
                              echo '<div class="alert alert-danger">Gagal.</div>'; 
                              echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                          }
                      } else {
                        if(in_array($ekstensi, $yang_boleh) == true){
                          if($ukuran < 1044070){
                              // Cek apakah file foto sebelumnya ada di folder images
                              if(is_file("img/".$namalama)) // Jika foto ada
                              unlink("img/".$namalama); // Hapus file foto sebelumnya yang ada di folder images

                              move_uploaded_file($file_tmp,'img/'.$namabaru);
                              $ubah  = $con->query("UPDATE instansi SET
                                    nama_instansi   = '$nama_instansi', 
                                    alamat     = '$alamat_instansi', 
                                    nama_pimpinan = '$pimpinan',
                                    nrp_pimpinan = '$nrp', 
                                    website = '$website',
                                    logo = '$namabaru'
                                    ");
                              if($ubah){
                                  echo '<div class="alert alert-success">Berhasil telah diedit</div>'; 
                                  echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                              } else{
                                  echo '<div class="alert alert-danger">Gagal.</div>'; 
                                  echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                              }
                          } else {
                              echo '<div class="alert alert-info">Gambar terlalu besar</div>'; ;
                              echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                          }
                      } else {
                          echo '<div class="alert alert-danger">Ekstensi gambar yaitu jpg, jpeg, png</div>'; 
                          echo '<meta http-equiv="refresh" content="2; index.php "> '; 
                      }
                  }  
                  
                  } else {
                      $ambil = $con->query("SELECT * FROM instansi");
                      $hasil = $ambil->fetch_assoc();
                  }
                    ?>
                    <div class="form-group">
                      <label for="nama_instansi">Nama Instansi</label>
                      <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                      value="<?= $hasil['nama_instansi']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat_instansi">Alamat</label>
                      <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                      value="<?= $hasil['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="pimpinan">Nama Pimpinan</label>
                      <input type="text" class="form-control" id="pimpinan" name="pimpinan"
                      value="<?= $hasil['nama_pimpinan']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="nrp">NRP Pimpinan</label>
                      <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $hasil['nrp_pimpinan']; ?>"
                        required>
                    </div>
                    <div class="form-group">
                      <label for="website">Website / Situs</label>
                      <input type="text" class="form-control" id="website" name="website"
                      value="<?= $hasil['website']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="logo">Upload Logo </label>
                      <input type="file" class="form-control" id="logo" name="gambar">
                      <p class="help-block"> * Isi jika ingen mengganti gambar ! <br>
                     * Abaikan jika Tidak ingin mengganti gambar ! </p>
                    </div>

                    <button type="submit" name="tekan" class="btn btn-login">Tambah Data</button>
                    <input type="hidden" name="namalama" value="<?= $hasil['gambar'] ; ?>">
                  </form>
                </div>
              </div>
            </div>
            <!-- </div> -->

            <div class="col-md-7">
              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Managemen Instansi</h6>
                  
                </div>
                <div class="card-body">
                  <?php
                  $tampil = $con->query("SELECT * FROM instansi");
                  while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                  <div class="media">
                    <div class="media-body">
                      <img src="<?= "img/" . $isi['logo']; ?>" class="img-responsive mb-3 ml-3" alt="logo"
                        style=" max-width:70px;">
                      <h5 class="mt-0 mb-1"><?= $isi['nama_instansi']; ?></h5>
                      <?= $isi['alamat']; ?> <br>
                      Dipimpin Oleh <?= $isi['nama_pimpinan']; ?> <br>
                      NRP <?= $isi['nrp_pimpinan']; ?> <br>
                      <i>Website <?= $isi['website']; ?></i> <br>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
          <div class="row mt-3">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header">
                  <h6 class="text-gray">Data Admin</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Hapus </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $tampil = $con->query("SELECT * FROM admin");
                        while ($isi = mysqli_fetch_assoc($tampil)) {

                          ?>
                        <tr>
                          <td><?= $no++; ?>.</td>
                          <td><?= $isi["nama_admin"]; ?></td>
                          <td><?= $isi["username_admin"]; ?> </td>
                          <td>
                            <a href="hapus_admin.php?id=<?= $isi['id_admin']; ?>" class="fa-sm text-gray-600"
                              onclick="return confirm('Anda yakin akan menghapus data?')"><span class="badge badge-danger"><i
                                class="fa fa-trash fa-sm"></i></span></a>
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
    </div>
    <?php include 'footer.php'; ?>