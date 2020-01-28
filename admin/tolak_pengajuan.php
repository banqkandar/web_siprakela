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

    $ubah =$con->query("UPDATE pengajuan SET status = 'tidak diterima' WHERE id_pengajuan = $id");  
    if($ubah){
        echo 'window.alert("Data pengajuan berhasil disimpan");';
    }else{
        echo 'window.alert("Gagal.");';
    }   
  }
  header("location:pengajuan_ditolak.php");
  }
?>
