<?php
require_once "../config.php";
session_start();
if (isset($_SESSION['username'])) {
    $username   = $_SESSION['username'];
    $admin      = $_SESSION['admin'];
}
if (!(isset($_SESSION['username']))) {
    echo '
    <script>
        window.alert("Oops, ini halaman saya");
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
    <title>Halaman <?= $_SESSION['username'] ? 'Saya' : 'Admin' ?></title>
    <link rel="stylesheet" href="../css/my.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/global.png" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #191919;">
            <div class="sidebar-brand d-flex align-items-center justify-content-center mt-5 mb-5">
                <div class="sidebar-brand-icon mt-3">
                    <img class="mb-2" src="img/user.svg" style="width:5em">
                    <?php
                    // if ($_SESSION['admin']) {
                    //     $admin = $_SESSION['admin'];
                        $ambil = $con->query("SELECT * FROM user");
                        $data = $ambil->fetch_array();
                    // } else {
                    //     $user = $_SESSION['username'];
                    //     $ambil = $con->query("SELECT * FROM user where id_user='$user'");
                    //     $data = $ambil->fetch_array();
                    // } 
                    ?>
                <h1 class="h6 text-white"><?= $data['nama_user'] ?></h1>
                </div>
            </div>
            <hr class="sidebar-divider my-0">