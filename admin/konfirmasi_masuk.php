<?php
require_once "../config.php";
session_start();
if (!(isset($_SESSION['admin']))) {
    echo '
    <script>
        window.alert("Oops, ini halaman admin");
        window.location = "../login.php";
    </script>
    ';
  }else{
  //mengecek apakah di url ada GET id
  if (isset($_GET["id"])) {
    // menyimpan variabel id dari url ke dalam variabel $id
    $id           = $_GET["id"];
    // $tanggal_acc  = today();
    $ubah         = $con->query("UPDATE absen SET status_masuk = 'telah absen', tanggal_acc = now() WHERE id_absen = '$id'");  
    if($ubah){
      echo '
      <script>
          window.alert("Berhasil telah mengkonfirmasi absen masuk.");
          window.location = "absen.php";
      </script>
      ';
    }else{
      echo '
      <script>
          window.alert("Gagal");
          window.location = "absen.php";
      </script>
      ';
    }   
  }
  header("location:absen.php");
  }
?>
