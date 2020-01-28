<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mt-5 text-gray-800">Data User</h1>
  </div>
  <div class="row">

    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Edit User Penelitian</h6>
        </div>
        <div class="card-body">
        <?php $id_user = $_GET['id'];?>
          <form class="user" action="" method="post">
            <?php
            if (isset($_POST['edit'])){
                $noinduk       = $_POST['noinduk'];
                $jurusan       = $_POST['jurusan'];
                $pendidikan    = $_POST['pendidikan'];
                $edit = "UPDATE user SET 
                            no_induk = '$noinduk' ,
                            jurusan = '$jurusan' ,
                            pendidikan = '$pendidikan'
                        WHERE
                            id_user = '$id_user' 
                        ";
                $masuk  = $con->query($edit); 
                if($masuk){
                    echo '<div class="alert alert-success">Data user berhasil diubah</div>';
                    echo '<meta http-equiv="refresh" content="2; user.php "> ';
                  }else{
                    echo '<div class="alert alert-danger">Data user gagal diubah</div>';
                    echo '<meta http-equiv="refresh" content="2; edit_user.php "> ';
                }
            } else {
                $ambil = $con->query("SELECT * FROM user JOIN pengajuan USING (id_pengajuan) WHERE id_user = '$id_user'");
                $isi = $ambil->fetch_assoc();
            }
            ?>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= ucwords($isi['nama']);?>" required disabled>
            </div>

            <div class="form-group">
              <label for="noinduk">No Induk</label>
              <input type="number" class="form-control" id="noinduk" name="noinduk" value="<?= $isi['no_induk'];?>"
                required>
            </div>

            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $isi['jurusan'];?>"
                required>
            </div>

            <div class="form-group">
              <label>Pendidikan</label>
              <select name="pendidikan" class="form-control" required>
                <option value="">Pilih pendidikan</option>
                <option value="sma">SMA</option>
                <option value="smk">SMK</option>
                <option value="s1">Strata 1</option>
                <option value="d3">Diploma 3</option>
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