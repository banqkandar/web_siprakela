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
    $id = $_GET["id"];

    $ubah =$con->query("UPDATE absen SET status_masuk = 'Sudah Absen Masuk' WHERE id_absen = $id");  
    if($ubah){
        echo 'window.alert("Berhasil telah mengkonfirmasi absen masuk.");';
    }else{
        echo 'window.alert("Gagal.");';
    }   
  }
  header("location:absen.php");
  }
?>
