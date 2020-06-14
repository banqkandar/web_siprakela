<?php require_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman <?= $_SESSION['pembimbing'] ? 'Pembimbing' : 'Saya' ?></title>
    <link rel="stylesheet" href="css/cetak_nilai.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/global.png" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <?php
    $id_pembimbing = $_GET['id'];
    $ambil   = $con->query("SELECT * FROM pembimbing WHERE id_pembimbing = $id_pembimbing");
    $hasil   = $ambil->fetch_assoc();
    ?>
    <div class="mt-5">
        <div class="col-md-5 ml-3">
            <h5>Selamat, akun anda telah dibuat.</>
        </div>
        <div class="col-md-5">
            <table class="m-3">
                <tr>
                    <td class="m-2 p-2">Username: <?= $hasil['username']; ?></td>
                </tr>
                <tr>
                    <td class="m-2 p-2">Password: <?= $hasil['username']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>