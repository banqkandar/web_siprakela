<?php
require_once "config.php";
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>

<!-- content -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4 mr-3">
                <h1 class="judul">Sistem Informasi Praktek Kerja<br> Lapangan</h1>
                <p class="sub">Sebuah tempat penelitian di bidang operasional - mengembangkan kualitas baru - mencari
                    pengalaman kerja dilapangan</p>
                <a href="ajukan.php" class="btn btn-minat d-flex">Tertarik</a>
                <!-- <button class="btn btn-berita" type="submit"><i class="fa fa-newspaper-o"></i> BERITA</button> -->
            </div>
            <div class="col-md-5">
                <img class="gambar" src="img/email.svg" style="width:30em;">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="judul text-center mt-5">Mulai aja dulu</h1>
    <p class="font-weight-light text-center">Join dengan kami sekarang <br>kamu akan dapatkan pengalaman baru untuk masa
        depanmu</p>
    <div class="row mb-5 mt-5 align-items-center justify-content-center">
        <div class="col-lg-3 mr-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <img class="mb-3 mt-3" src="img/11.svg" style="width:10em;">
                    <h4 class="judul-card">Perekrutan</h4>
                    <p class="subjudul">Daftar diri anda sebagai calon peserta sesuai format yang telah disediakan.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mr-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <img class="mb-3 mt-3" src="img/12.svg" style="width:10em;">
                    <h4 class="judul-card">Pengalaman</h4>
                    <p class="subjudul">Dapatkan pengalaman di lapangan kerja seperti bekerja di dunia nyata.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <img class="mb-3 mt-3" src="img/13.svg" style="width:9em;">
                    <h4 class="judul-card">Penghargaan</h4>
                    <p class="subjudul">Anda mendapat penilaian yang sesuai dengan hasil kerja anda selama masa bekerja.</p>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="container">
    <h1 class="judul text-center mt-5">Prasyarat</h1>
    <p class="font-weight-light text-center">Silahkan dibaca syarat-syarat berikut <br>agar judul yang telah diajukan
        dapat diterima oleh pihak kami </p>
    <div class="row mb-5 mt-5 align-items-center justify-content-center">
        <div class="col-lg-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">- Mengisi form pengajuan tempat</li>
                <li class="list-group-item">- Berdomisili bandung</li>
                <li class="list-group-item">- Sedang menjalani SMA/Kuliah</li>
                <li class="list-group-item">- Upload Surat Lamaran</li>
            </ul>
        </div>
        <div class="col-lg-4 mr-3">
            <img class="gambar" src="img/list.svg" style="width:30em;">
        </div>
    </div>
</div>

<div class="row mx-auto justify-content-center align-items-center mt-5 mb-5 pt-4">
    <div class="col-auto text-gray-500 font-weight-light">© 2019 Sitipol Polrestabes • All rights reserved </div>
    <div class="col-auto"><img src="img/global.svg" height="30" alt="logo" /></div>
</div>
<?php include('footer.php'); ?>