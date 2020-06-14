<?php
require_once "config.php";
session_start();
if (isset($_SESSION['username'])) {
    header("location:saya");
} elseif (isset($_SESSION['admin'])) {
    header("location:admin");
}
?>
<?php include('header.php'); ?>
<div class="container h-100 mt-5">
    <div class="row align-items-center justify-content-center ">
        <div class="col-lg-3">
            <a href="index.php">
                <img src="img/global.png" class="logo" width="50" alt="logo siprakela" />
            </a>
            <h1 class="h3 font-weight-bold mt-4 pt-1 judul-login">Masuk</h1>
            <p class="subjudul h8 mt-1 mb-4 ">Masuk untuk memulai</p>

            <form class="user" method="post" action="">
                <?php
                if ($_POST) {
                    $username   = $_POST['uname'];
                    $userpass   = $_POST['pswd'];
                    $cek_admin = $con->query("SELECT * FROM admin WHERE username_admin = '$username'");
                    $admin = $cek_admin->fetch_assoc();
                    $admin_password = $admin['password_admin'];
                    if ($cek_admin->num_rows == 1) {
                        if (password_verify($userpass, $admin_password)) {
                            session_start();
                            $_SESSION['admin']   = $admin['id_admin'];
                            echo '
                                <script>
                                    window.alert("Anda berhasil login sebagai admin.");
                                    window.location = "admin";
                                </script>
                            ';
                        } else {
                            echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                            echo '<meta http-equiv="refresh" content="2; login.php "> ';
                        }
                    } else {
                        $cek_login = $con->query("SELECT * FROM user WHERE username = '$username'");
                        $user = $cek_login->fetch_assoc();
                        $user_password = $user['password'];
                        if ($cek_login->num_rows == 1) {
                            if (password_verify($userpass, $user_password)) {
                                session_start();
                                $_SESSION['username'] = $user['id_user'];
                                echo '
                                <script>
                                    window.alert("Anda berhasil login sebagai user.");
                                    window.location = "saya";
                                </script>
                            ';
                            } else {
                                echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                                echo '<meta http-equiv="refresh" content="2; login.php "> ';
                            }
                        } else {
                            $cek = $con->query("SELECT * FROM pembimbing WHERE username = '$username'");
                            $pembimbing = $cek->fetch_assoc();
                            $pembimbing_password = $pembimbing['password'];
                            if ($cek->num_rows == 1) {
                                if (password_verify($userpass, $pembimbing_password)) {
                                    session_start();
                                    $_SESSION['pembimbing'] = $pembimbing['id_pembimbing'];
                                    echo '
                                    <script>
                                        window.alert("Anda berhasil login sebagai pembimbing.");
                                        window.location = "pembimbing";
                                    </script>
                                ';
                                } else {
                                    echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                                    echo '<meta http-equiv="refresh" content="2; login.php "> ';
                                }
                            } else {
                                echo '<div class="alert alert-danger">Gagal masuk, belum terdaftar</div>';
                                echo '<meta http-equiv="refresh" content="2; login.php "> ';
                            }
                        }
                    }
                }
                ?>
                <label class="sr-only" for="username">Username</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" id="username" name="uname" placeholder="Username" autofocus required>
                </div>

                <label class="sr-only" for="password">Password</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <input type="password" class="form-control" id="password" name="pswd" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-login mt-4">Masuk Akun Saya</button>
                <hr class="bullet" />
            </form>
            <a href="daftar.php" class="btn btn-regis btn-block ">Daftar Akun Baru</a>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>