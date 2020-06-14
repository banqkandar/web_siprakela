<?php
require_once "../config.php";
session_start();
if (isset($_SESSION['username'])) {
    $username   = $_SESSION['username'];
    $admin      = $_SESSION['admin'];
}
if (!(isset($_SESSION['admin']))) {
    echo '
    <script>
        window.alert("Oops, ini halaman admin");
        window.location = "../login.php";
    </script>
    ';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman <?= $_SESSION['admin'] ? 'Admin' : 'Saya' ?></title>
    <link rel="stylesheet" href="../css/my.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/all.min.css"  type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css" >
    <link rel="stylesheet" href="../css/sb-admin-2.min.css" >
    <link rel="icon"       href="../img/global.png" type="image/png"/>

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #191919;">
            <div class="sidebar-brand d-flex align-items-center justify-content-center mt-5">
                <div class="sidebar-brand-icon mt-3">
                    <img class="mb-2" src="img/user.svg" style="width:3em">

                    <?php
                        $admin = $_SESSION['admin'];
                        $ambil = $con->query("SELECT * FROM admin WHERE id_admin = $admin");
                        $data = $ambil->fetch_array();
                    ?>
                    <h3 class="h6 text-white"><?= $data['nama_admin'] ?>
                    <span class="badge badge-pill badge-secondary"><a  href="editprofil.php"<i class="fas fa-fw fa-cog" style="color:#DDDDDD; text-decoration:none"></i></a></span></h3>
                </div>
            </div>
                <div class="d-flex align-items-center justify-content-center mt-3 mb-5">
                    <a href="index.php" class="btn btn-sm badge-danger badge-counter">
                        <?php
                        $count_terima = $con->query("SELECT count(*) FROM pengajuan WHERE status='belum diterima'");
                        $jumlah = mysqli_fetch_row($count_terima);
                        $hasil = $jumlah[0];
                        ?>
                        Notifications <span class="badge badge-light"><?= $hasil;?></span>
                    </a>
                </div>
            
            <hr class="sidebar-divider my-0">