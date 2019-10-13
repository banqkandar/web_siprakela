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
                <p class="sub">Sebuah tempat penelitian di bidang operasional - mengembangkan kualitas baru - mencari pengalaman kerja dilapangan</p>
                <a href="#ayo" class="btn btn-minat d-flex">Tertarik <i class="material-icons">arrow_forward</i></a>
                <!-- <button class="btn btn-berita" type="submit"><i class="fa fa-newspaper-o"></i> BERITA</button> -->
            </div>
            <div class="col-md-5">
                <img class="gambar" src="img/email.svg">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="judul text-center mt-5">Prasyarat</h1>
    <p class="font-weight-light text-center">Silahkan dibaca syarat-syarat berikut <br>agar judul yang telah diajukan dapat diterima oleh pihak kami </p>
    <div class="row mb-5 mt-5 align-items-center justify-content-center">
        <div class="col-lg-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">- Mengisi form pengajuan tempat</li>
                <li class="list-group-item">- Berdomisili bandung</li>
                <li class="list-group-item">- Sedang menjalani SMA/Kuliah</li>
                <li class="list-group-item">- Siap mental</li>
            </ul>
        </div>
        <div class="col-lg-4 mr-3">
            <img class="gambar" src="img/list.svg" style="width:30em;">
        </div>
    </div>
</div>
<hr>

<div class="container" id="ayo">
    <h1 class="judul text-center mt-5">Pengajuan Tempat</h1>
    <p class="font-weight-light text-center">Isi form berikut dengan men-submit tentang dirimu <br>agar kami lebih mudah mengenalmu</p>
    <div class="row mb-5 mt-5">
        <div class="col-lg-5 mr-3">
            <img class="gambar" src="img/addfile.svg" style="width:30em;">
        </div>
        <div class="col-lg-6">
            <form class="user" method="post" action="">
            <?php
            if (isset($_POST['simpan'])){
                $email          = $_POST['email'];
                $kampus         = $_POST['kampus'];
                $idpenelitian   = $_POST['idpenelitian'];
                $idbagian       = $_POST['idbagian'];
                $tambah = "INSERT INTO pengajuan (id_pengajuan, email, kampus, id_penelitian, id_bagian, tanggal) VALUES (null,'$email','$kampus','$idpenelitian','$idbagian',now())";
                $masuk  = $con->query($tambah); 
                if($masuk){
                    echo '<div class="alert alert-success">Berhasil.</div>';
                    echo '<meta http-equiv="refresh" content="2; index.php "> ';
                }else{
                    echo '<div class="alert alert-danger">Gagal.</div>';
                    echo '<meta http-equiv="refresh" content="2; index.php "> ';
                }
            }
            ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="cth: example@gmail.com" required>
                </div>

                <div class="form-group">
                    <label for="kampus">Instansi/Kampus</label>
                    <input type="text" class="form-control form-control-sm" id="kampus" name="kampus" placeholder="cth: UNIKOM" required>
                </div>

                <div class="form-group">
                    <label>Sedang Penelitian</label>
                    <select name="idpenelitian" class="form-control" required>
                        <option value="">Pilih penelitian</option>
                        <?php
                        $tampil = $con->query("SELECT id_penelitian , nama_penelitian  FROM jenis_penelitian");
                        while ($r = mysqli_fetch_assoc($tampil)) {
                            echo '<option value="' . $r[id_penelitian] . '" >' . $r[nama_penelitian] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Bagian</label>
                    <select name="idbagian" class="form-control" required>
                        <option value="">Pilih bagian</option>
                        <?php
                        $tampil = $con->query("SELECT id_bagian , nama_bagian  FROM bagian");
                        while ($r = mysqli_fetch_assoc($tampil)) {
                            echo '<option value="'.$r[id_bagian].'" >' . $r[nama_bagian] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-minat float-right" name="simpan">submit</button>
            </form>
        </div>
    </div>
</div>

<div class="row mx-auto justify-content-center align-items-center mt-5 mb-5 pt-4">
    <div class="col-auto text-gray-500 font-weight-light">© 2019 Sitipol Polrestabes • All rights reserved </div>
    <div class="col-auto"><img src="img/global.svg" height="30" alt="logo" /></div>
</div>
<?php include('footer.php'); ?>