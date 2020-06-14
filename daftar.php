<?php include("config.php"); ?>
<?php include('header.php'); ?>
<div class="container h-100 mt-5">
    <div class="row align-items-center justify-content-center ">
        <div class="col-lg-3">
            <a href="login.php" class="kembali d-flex">
                <i class="fas fa-arrow-left mr-2 mt-1"></i>
                <span>Kembali</span>
            </a>
            <h1 class="h3 font-weight-bold mt-4 pt-1 judul-login">Akun Baru</h1>
            <p class="subjudul h8 mt-1 mb-4 ">Daftar akunmu sekarang</p>

            <form method="POST" action="">
                <?php
                if ($_POST) {
                    $nama     = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $encrypt  = password_hash($password, PASSWORD_DEFAULT);
                
                    $cek_username = $con->query("SELECT * FROM admin WHERE username_admin ='" . $username . "'");
                    $hasil        = $cek_username->fetch_array();
                    if ($ada) {
                        echo '<div class="alert alert-danger">Username sudah ada.</div>';
                        echo '<meta http-equiv="refresh" content="2; daftar.php "> ';
                    } elseif ($hasil) {
                        echo '<div class="alert alert-danger">Username sudah ada.</div>';
                        echo '<meta http-equiv="refresh" content="2; daftar.php "> ';
                    } else {
                        $daftar = "INSERT INTO admin (id_admin, nama_admin, username_admin, password_admin) VALUES (NULL, '$nama', '$username', '$encrypt')";
                        $submit = $con->query($daftar);
                        echo '<div class="alert alert-success">Berhasil, anda telah menjadi Admin.</div>';
                        echo '<meta http-equiv="refresh" content="2; daftar.php "> ';
                    }
                }
                ?>

                <label class="sr-only" for="nama">Nama Lengkap</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autofocus
                        required>
                </div>

                <label class="sr-only" for="username">Username</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>

                <label class="sr-only" for="password">Password</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-login mt-4">Buat Akun</button>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>