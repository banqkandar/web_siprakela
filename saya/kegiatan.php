<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
    <div class="mb-4">
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="h4 mt-5 text-gray-800 ">Kegiatan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <?php $id_user = $_SESSION['username']; ?>
            <h1 class="h6 mt-5 text-gray-800 mb-3">Upload foto-foto untuk dokumentasi dan menyimpan momen penting.</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <?php 
                if (isset($_POST["kirim"])) {
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal  = date("Y-m-d");
                    $jumlah   = count($_FILES['gambar']['name']);
                    if ($jumlah > 0) {
                        for ($i=0; $i < $jumlah; $i++) { 
                            $file_name = $_FILES['gambar']['name'][$i];
                            $tmp_name = $_FILES['gambar']['tmp_name'][$i];				
                            move_uploaded_file($tmp_name, "img/".$file_name);
                            mysqli_query($con,"INSERT INTO kegiatan VALUES('', '$id_user', '$file_name', '$tanggal')");				
                        }
                        echo '<div class="alert alert-success">Berhasil Upload.</div>';
                        echo '<meta http-equiv="refresh" content="2; kegiatan.php "> ';
                    }
                    else{
                        echo '<div class="alert alert-danger">Gagal.</div>';
                    echo '<meta http-equiv="refresh" content="2; kegiatan.php "> ';
                    }
                }
            ?>
                <input type="file" name="gambar[]" multiple class="mb-2">
                <button type="submit" class="btn btn-login" name="kirim">Upload Foto-foto</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tutup
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                            <?php 
                            $ambil = $con->query("SELECT * FROM kegiatan WHERE id_user ='$id_user' ORDER BY id_kegiatan DESC");
                            while ($isi = mysqli_fetch_assoc($ambil)) { ?>
                                <img src="<?= "img/" . $isi['gambar']; ?>"
                                    class="ml-4 mb-3 img-fluid img-responsive img-thumbnail rounded" style="width:10%;">
                                    <?php } ?>
                                <p>
                                    <?php
                                    $date = date_create($isi['tanggal']);
                                    echo date_format($date, "l, d F Y");?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>