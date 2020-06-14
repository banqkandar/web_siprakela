<?php
include("../config.php");
session_start();
if (!(isset($_SESSION['pembimbing']))) {
echo '
<script>
    window.alert("Oops, ini halaman pembimbing");
    window.location = "../login.php";
</script>
';
} else {
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM penilaian WHERE id_nilai = '$id' ";
    $hasil_query = $con->query($query);

    if ($hasil_query) {
        echo 'window.alert("Berhasil dihapus");';
    } else {
        echo 'window.alert("Gagal.");';
    } 
    }
    header("location:penilaian.php");
    }
?>
    