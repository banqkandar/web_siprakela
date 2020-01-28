<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Jadwal</h1>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Tambah Jadwal</h6>
        </div>
        <div class="card-body">
          <form class="user" action="" method="post">
          <?php
            if (isset($_POST['tambah'])){
                $judul      = $_POST['judul'];
                $tanggal    = $_POST['tanggal'];
                $waktu      = $_POST['waktu'];
                $tempat     = $_POST['tempat'];
                $ringkasan  = $_POST['ringkasan'];
                $status     = $_POST['status'];
                $tambah = "INSERT INTO agenda (id_agenda, judul_agenda, tanggal, waktu, tempat, ringkasan, status) VALUES (null,'$judul','$tanggal','$waktu','$tempat','$ringkasan', '$status')";
                $masuk  = $con->query($tambah); 
                if($masuk){
                    echo '<div class="alert alert-success">Data berhasil ditambahkan</div>';
                    echo '<meta http-equiv="refresh" content="2; jadwal.php "> ';
                }else{
                    echo '<div class="alert alert-danger">data gagal ditambahkan</div>';
                    echo '<meta http-equiv="refresh" content="2; tambah_jadwal.php "> ';
                }
            }
            ?>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Pemasangan CCTV" autofocus required>
            </div>
            <div class="form-group">
              <label for="tanggal">Hari, tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="time" class="form-control" id="waktu" name="waktu" required>
            </div>
            <div class="form-group">
              <label for="tempat">Tempat</label>
              <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Gedung Sate"
                required>
            </div>
            <div class="form-group">
              <label for="ringkasan">Ringkasan</label>
              <textarea class="form-control" id="ringkasan" name="ringkasan" placeholder="Siapkan semua peralatan, jangan sampai telat."></textarea>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="Penting Sekali">Penting Sekali</option>
                <option value="Penting">Penting</option>
                <option value="Cukup Penting">Cukup Penting</option>
              </select>
            </div>
            <button type="submit" name="tambah" class="btn btn-login">Buat Jadwal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>