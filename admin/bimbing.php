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
                    <h6 class="text-gray">Penempatan user dengan pembimbing</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="">
                        <?php
                    if (isset($_POST['tambah'])) {
                        $user       = $_POST['user'];
                        $pembimbing = $_POST['pembimbing'];

                        $cek        = $con->query("SELECT * FROM bimbing WHERE id_user ='$user' AND id_pembimbing ='$pembimbing'");
                        $hasil      = $cek->fetch_array();

                        if ($hasil) {
                            echo '<div class="alert alert-danger">Penempatan user dengan pembimbing tidak boleh sama.</div>';
                            echo '<meta http-equiv="refresh" content="2; bimbing.php "> ';
                        } else { 
                            $tambah = "INSERT INTO bimbing VALUES('','$user','$pembimbing')";
                            $masuk = $con->query($tambah);
                            if ($masuk) {
                                echo '<div class="alert alert-success">Berhasil dipasangkan</div>';
                                echo '<meta http-equiv="refresh" content="2; bimbing.php "> ';
                            } else {
                                echo '<div class="alert alert-danger">Gagal dipasangkan</div>';
                                echo '<meta http-equiv="refresh" content="2; bimbing.php "> ';
                            }
                        }
                    }
                    ?>

                        <div class="form-group">
                            <label>User</label>
                            <select name="user" class="form-control" required>
                                <option value="">Pilih User</option>
                                <?php
                            $tampil = $con->query("SELECT * FROM user JOIN pengajuan USING (id_pengajuan)");
                            while ($r = mysqli_fetch_assoc($tampil)) {
                                echo '<option value="' . $r['id_user'] . '" >' . ucwords($r['nama']) . ' - ' . $r['email'] . '</option>';
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
                                    echo '<option value="' . $r['id_pembimbing'] . '" >' . ucwords($r['nama_pembimbing']) . '</option>';
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
                    <h6 class="text-gray">Penempatan user dengan pembimbing</h6>
                </div>
                <?php 
                $no=1;
                $ambil      = $con->query("SELECT * FROM bimbing join user using(id_user) join pengajuan using(id_pengajuan) join pembimbing using(id_pembimbing) ORDER BY id_user ASC");
                while ($isi = $ambil->fetch_assoc()) { ?>
                <div class="m-2">
                    <div class="card p-1">
                            <?= $no++; ?>. <?= ucwords($isi['nama']); ?>(User) dibimbing oleh <?= ucwords($isi['nama_pembimbing']); ?>(Pembimbing)
                            <a href="hapus_bimbing.php?id=<?= $isi['id_bimbing']; ?>" class="fa-sm text-gray-600"
                      onclick="return confirm('Anda yakin akan memputuskan pasangan user?')"><span class="badge badge-danger">Hapus</span></a>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>