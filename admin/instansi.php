<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="h4 mt-5 text-gray-800 ">Kelola Data Instansi</h1>
      <p class="subjudul">Informasi yang berkaitan dengan data instansi</p>
    </div>
  </div>
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
                      $namalama         = $_POST['namalama'];


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
                            echo '<div class="alert alert-success">Berhasil telah diubah</div>'; 
                              echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
                            } else {
                              echo '<div class="alert alert-danger">Gagal diubah.</div>'; 
                              echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
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
                                  echo '<div class="alert alert-success">Berhasil telah diubah</div>'; 
                                  echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
                              } else{
                                  echo '<div class="alert alert-danger">Gagal diubah.</div>'; 
                                  echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
                              }
                          } else {
                              echo '<div class="alert alert-info">File gambar terlalu besar</div>'; ;
                              echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
                          }
                      } else {
                          echo '<div class="alert alert-danger">Harus ekstensi gambar yaitu jpg, jpeg, png</div>'; 
                          echo '<meta http-equiv="refresh" content="1; instansi.php "> '; 
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
                      <textarea class="form-control" id="alamat_instansi" name="alamat_instansi" rows="2" required><?= $hasil['alamat']; ?></textarea>
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

                    <button type="submit" name="tekan" class="btn btn-login">Ubah Data</button>
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
                      Website <a href="<?= $isi['website']; ?>" target="_blank"><i><?= $isi['website']; ?></i></a> <br>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
  
  <?php include 'footer.php'; ?>