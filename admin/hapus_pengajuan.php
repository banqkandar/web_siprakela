<?php
include("../config.php");
session_start();
if (!(isset($_SESSION['admin']))) {
echo '
<script>
    window.alert("Oops, ini halaman admin");
    window.location = "../login.php";
</script>
';
} else {
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM pengajuan WHERE id_pengajuan = '$id' ";
    $hasil_query = $con->query($query);

    if ($hasil_query) {
        echo 'window.alert("Berhasil dihapus");';
    } else {
        echo 'window.alert("Gagal dihapus.");';
    } 
    }
    header("location:index.php");
    }
?>
    