<?php
require_once "config.php";
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide1.jpg" class="img-fluid">
    </div>
    <div class="carousel-item">
      <img src="img/slide2.jpg" class="img-fluid">
    </div>
    <div class="carousel-item">
      <img src="img/slide3.jpg" class="img-fluid">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="jumbotron" style="background-color: #fff;">
  <div class="container mb-3">
    <div class="media">
      <?php
        $no = 1;
        $tampil = $con->query("SELECT * FROM instansi");
        while ($isi = mysqli_fetch_assoc($tampil)) {

        ?>
      <img src="<?= "admin/img/" . $isi['logo']; ?>" class="mr-3" alt="logo" style=" max-width:120px;">
      <div class="media-body">
        <h1 class="judul mt-4"><?= $isi['nama_instansi']; ?></h1>
        <p class="lead">Melindungi, Mengayomi dan Melayani Masyarakat.</p>
        <?php 
        }
         ?>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="container mb-3">
  <div class="row">
    <div class="col-md-12">
      <h1 class="judul">Stuktur Organisasi</h1>
      <p class="sub">Struktur Organisasi Polrestabes Bandung</p>
      <img src="img/struktur.jpg" class="img-fluid mb-3" alt="">
      
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>