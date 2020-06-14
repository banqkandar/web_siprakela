<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data Pembimbing</h1>
  </div>
  <div class="row">

    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Edit Pembimbing</h6>
        </div>
        <div class="card-body">
        <?php $id_pembimbing = $_GET['id'];?>
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['edit'])){
                $nama          = $_POST['nama'];
                $nrp           = $_POST['nrp'];
                $no_telepon    = $_POST['no_telepon'];
                $jabatan       = $_POST['jabatan'];
                $edit = "UPDATE pembimbing SET 
                            nama_pembimbing = '$nama', 
                            nrp_pembimbing = '$nrp', 
                            no_telepon = '$no_telepon', 
                            jabatan = '$jabatan',
                        WHERE
                            id_pembimbing = '$id_pembimbing' 
                        ";
                $masuk  = $con->query($edit); 
                if($masuk){
                    echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                    echo '<meta http-equiv="refresh" content="2; pembimbing.php "> ';
                  }else{
                    echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                    echo '<meta http-equiv="refresh" content="2; edit_pembimbing.php "> ';
                }
            } else {
                $ambil = $con->query("SELECT * FROM pembimbing WHERE id_pembimbing = '$id_pembimbing'");
                $hasil = $ambil->fetch_assoc();
            }
            ?>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= ucwords($hasil['nama_pembimbing']);?>" required>
            </div>

            <div class="form-group">
              <label for="nrp">NRP</label>
              <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $hasil['nrp_pembimbing'];?>" size="8" autofocus
                required>
            </div>

            <div class="form-group">
              <label for="no_telepon">No Telepon</label>
              <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= $hasil['no_telepon'];?>" required>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $hasil['jabatan'];?>" required>
            </div>

            <button type="submit" name="edit" class="btn btn-login">Edit Data</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>