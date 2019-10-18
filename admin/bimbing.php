<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mt-5 text-gray-800 ">Bimbing</h1>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="text-gray">Penempatan user oleh pembimbing</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="">
                        <?php
                    if (isset($_POST['tambah'])) {
                        $user = $_POST['user'];
                        $pembimbing = $_POST['pembimbing'];

                        $cek    = $con->query("SELECT * FROM bimbing WHERE id_user ='$user' and id_pembimbing ='$pembimbing'");
                        $hasil    = $cek->fetch_array();

                        if ($hasil) {
                            echo '<div class="alert alert-danger"> Proses ini tidak boleh sama.</div>';
                        } else { 
                            $tambah = "INSERT INTO bimbing VALUES('','$user','$pembimbing')";
                            $masuk = $con->query($tambah);
                            if ($masuk) {
                                echo '<div class="alert alert-success">Berhasil.</div>';
                                echo '<meta http-equiv="refresh" content="2; bimbing.php "> ';
                            } else {
                                echo '<div class="alert alert-danger">Gagal.</div>';
                            }
                        }
                    }
                    ?>

                        <div class="form-group">
                            <label>User</label>
                            <select name="user" class="form-control" required>
                                <option value="">Pilih User</option>
                                <?php
                            $tampil = $con->query("SELECT id_user , nama_user  FROM user");
                            while ($r = mysqli_fetch_assoc($tampil)) {
                                echo '<option value="' . $r[id_user] . '" >' . $r[nama_user] . '</option>';
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pembimbing</label>
                            <select name="pembimbing" class="form-control" required>
                                <option value="">Pilih Pembimbing</option>
                                <?php
                            $tampil = $con->query("SELECT id_pembimbing , nama_pembimbing  FROM pembimbing");
                            while ($r = mysqli_fetch_assoc($tampil)) {
                                echo '<option value="' . $r[id_pembimbing] . '" >' . $r[nama_pembimbing] . '</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-login">Pasangkan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-gray">Penempatan user oleh pembimbing</h6>
                </div>
                <?php 
                $no=1;
                $ambil = $con->query("SELECT * FROM bimbing join user using(id_user) join pembimbing using(id_pembimbing) ");
                while ($isi = $ambil->fetch_assoc()) { ?>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <?= $no++; ?>. <?= $isi['nama_user']; ?>(User) dibimbing oleh <?= $isi['nama_pembimbing']; ?>(Pembimbing)
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>