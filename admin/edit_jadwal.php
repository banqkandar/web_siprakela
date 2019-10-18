<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 mt-5 text-gray-800">Jadwal</h1>
    <a href="jadwal.php" class="mt-5 d-none d-sm-inline-block btn btn-md btn-light">Kembali</a>
  </div>
  <div class="row">

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Edit User Penelitian</h6>
        </div>
        <div class="card-body">
        <?php $id_agenda = $_GET['id'];?>
          <form class="user" action="" method="post">
          <?php
            if (isset($_POST['edit'])){
                $judul      = $_POST['judul'];
                $tanggal    = $_POST['tanggal'];
                $waktu      = $_POST['waktu'];
                $tempat     = $_POST['tempat'];
                $ringkasan  = $_POST['ringkasan'];
                $status     = $_POST['status'];
                $edit = "UPDATE agenda SET 
                            judul_agenda = '$judul', 
                            tanggal = '$tanggal', 
                            waktu = '$waktu', 
                            tempat = '$tempat' ,
                            ringkasan = '$ringkasan' ,
                            status = '$status' 
                        WHERE
                            id_agenda = '$id_agenda' 
                        ";
                $masuk  = $con->query($edit); 
                if($masuk){
                    echo '<div class="alert alert-success">Berhasil.</div>';
                    echo '<meta http-equiv="refresh" content="2; jadwal.php "> ';
                }else{
                    echo '<div class="alert alert-danger">Gagal.</div>';
                }
            } else {
                $ambil = $con->query("SELECT * FROM agenda WHERE id_agenda = '$id_agenda'");
                $hasil = $ambil->fetch_assoc();
            }
            ?>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" value="<?= $hasil['judul_agenda'];?>" required>
            </div>
            <div class="form-group">
              <label for="tanggal">Hari, tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $hasil['tanggal'];?>" required>
            </div>
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $hasil['waktu'];?>" required>
            </div>
            <div class="form-group">
              <label for="tempat">Tempat</label>
              <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $hasil['tempat'];?>"
                required>
            </div>
            <div class="form-group">
              <label for="ringkasan">Ringkasan</label>
              <textarea class="form-control" id="ringkasan" name="ringkasan" ><?= $hasil['ringkasan'];?></textarea>
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

            <button type="submit" name="edit" class="btn btn-login">Edit Data</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>