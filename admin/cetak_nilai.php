<?php require_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman <?= $_SESSION['admin'] ? 'Admin' : 'Saya' ?></title>
    <link rel="stylesheet" href="css/cetak_nilai.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/global.png" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="media">
                <img src="img/logo.png" class="align-self-center mr-3" style="width:10%;">
                <div class="media-body">
                    <h5 class="mt-0 j-header">Polrestabes Bandung</h5>
                    <p class="s-header">Melindungi, Mengayomi, dan Melayani Masyarakat</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="judul">
        <p>Penilaian Kerja Praktek<br><span>Universitas Komputer Indonesia</span></p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="header-judul">
                    <p class="as">Nama Mahasiswa/i</p>
                    <p class="as">NIM</p>
                    <p class="as">Nama Perusahaan</p>
                    <p class="as">Alamat Perusahaan</p>
                    <p class="as">Waktu Kerja Praktek</p>
                    <p class="as">Nama Pejabat Penilai</p>
                    <p class="as">Jabatan</p>
                </div>
            </div>
            <div class="col-md-5">
                <?php
                    $id_nilai = $_GET['id'];
                    $ambil = $con->query("SELECT * FROM penilaian JOIN user USING (id_user) JOIN instansi USING (id_instansi) WHERE id_nilai = '$id_nilai' ");
                    $hasil = $ambil->fetch_assoc();
                ?>
                <div class="isi-identitas">
                    <p class="as">: 
                        <?php
                            $nama = $hasil['nama_user']; 
                            $nama_baru = ucwords($nama);
                            echo $nama_baru;
                        ?>
                    </p>
                    <p class="as">: <?= $hasil['no_induk']; ?></p>
                    <p class="as">: <?= $hasil['nama_instansi']; ?></p>
                    <p class="as">: <?= $hasil['alamat']; ?></p>
                    <p class="as">: <?= $hasil['durasi']; ?> Bulan</p>
                    <p class="as">: Cecep Sutyanto, A. Md.</p>
                    <p class="as">: Ketua Pembimbing PKL</p>
                </div>
            </div>
        </div>
        




        <div class="container">
            <div class="row">
                <table>
                    <tr>
                        <th class="th1">No</th>
                        <th class="th2">Aspek yang dinilai</th>
                        <th class="th3">nilai</th>
                        <th class="th4">indek<br>prestasi</th>
                    </tr>
                    <tr>
                        <td class="td1">1</td>
                        <td class="td2">Disiplin Dalam Bekerja</td>
                        <td class="td3"><?= $hasil['a1']; ?></td>
                        <td class="td4">
                            <?php 
                                $nilaia1 = $hasil['a1'];
                                if($nilaia1 >= 80) {
                                    $grade = 'A';
                                } else if ($nilaia1 >= 70) {
                                    $grade = 'B';
                                } else if ($nilaia1 >= 55) {
                                    $grade = 'C';
                                } else if ($nilaia1 >= 41) {
                                    $grade = 'D';
                                } else if ($nilaia1 >= 0) {
                                    $grade = 'E';
                                }
                                echo $grade;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">2</td>
                        <td class="td2">Kemampuan Menyelesaikan Tugas</td>
                        <td class="td3"><?= $hasil['a2']; ?></td>
                        <td class="td4">
                        <?php 
                                $nilaia2 = $hasil['a2'];
                                if($nilaia2 >= 80) {
                                    $grade = 'A';
                                } else if ($nilaia2 >= 70) {
                                    $grade = 'B';
                                } else if ($nilaia2 >= 55) {
                                    $grade = 'C';
                                } else if ($nilaia2 >= 41) {
                                    $grade = 'D';
                                } else if ($nilaia2 >= 0) {
                                    $grade = 'E';
                                }
                                echo $grade;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">3</td>
                        <td class="td2">Prestasi Kerja</td>
                        <td class="td3"><?= $hasil['a3']; ?></td>
                        <td class="td4">
                        <?php 
                                $nilaia3 = $hasil['a3'];
                                if($nilaia3 >= 80) {
                                    $grade = 'A';
                                } else if ($nilaia3 >= 70) {
                                    $grade = 'B';
                                } else if ($nilaia3 >= 55) {
                                    $grade = 'C';
                                } else if ($nilaia3 >= 41) {
                                    $grade = 'D';
                                } else if ($nilaia3 >= 0) {
                                    $grade = 'E';
                                }
                                echo $grade;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">4</td>
                        <td class="td2">Inisiatif</td>
                        <td class="td3"><?= $hasil['a4']; ?></td>
                        <td class="td4">
                        <?php 
                                $nilaia4 = $hasil['a4'];
                                if($nilaia4 >= 80) {
                                    $grade = 'A';
                                } else if ($nilaia4 >= 70) {
                                    $grade = 'B';
                                } else if ($nilaia4 >= 55) {
                                    $grade = 'C';
                                } else if ($nilaia4 >= 41) {
                                    $grade = 'D';
                                } else if ($nilaia4 >= 0) {
                                    $grade = 'E';
                                }
                                echo $grade;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">5</td>
                        <td class="td2">Kepribadian</td>
                        <td class="td3"><?= $hasil['a5']; ?></td>
                        <td class="td4">
                        <?php 
                                $nilaia5 = $hasil['a5'];
                                if($nilaia5 >= 80) {
                                    $grade = 'A';
                                } else if ($nilaia5 >= 70) {
                                    $grade = 'B';
                                } else if ($nilaia5 >= 55) {
                                    $grade = 'C';
                                } else if ($nilaia5 >= 41) {
                                    $grade = 'D';
                                } else if ($nilaia5 >= 0) {
                                    $grade = 'E';
                                }
                                echo $grade;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>