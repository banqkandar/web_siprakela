<?php
require_once "config.php";
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>
<div class="container" id="ayo">
    <h1 class="judul text-center mt-5">Pengajuan Tempat</h1>
    <p class="font-weight-light text-center">Isi form berikut dengan men-submit tentang dirimu <br>agar kami lebih mudah
        mengenalmu</p>
    <div class="row mb-5 mt-5">
        <div class="col-lg-5 mr-3">
            <img class="gambar" src="img/addfile.svg" style="width:30em;">
        </div>
        <div class="col-lg-6">
            <form class="user" method="post" action="" enctype="multipart/form-data">
                <?php
                if (isset($_POST['simpan'])) {
                    $nama_lengkap   = $_POST['nama'];
                    $email          = $_POST['email'];
                    $kampus         = $_POST['kampus'];
                    $idpenelitian   = $_POST['idpenelitian'];

                    $file = $_FILES['surat'];
                    $namana = $_FILES['surat']['name'];
                    $file_name = $file['name'];
                    $file_temp = $file['tmp_name'];
                    $name = explode('.', $file_name);
                    $path = "files/" . $file_name;

                    if ($_FILES['surat']['name'] != "") {

                        $con->query("INSERT INTO pengajuan 
                            (id_pengajuan, nama, email, kampus, id_penelitian, surat_lamaran, status, tanggal)
                            VALUES(null,'$nama_lengkap','$email','$kampus','$idpenelitian','$namana', 'belum diterima',now())");

                        move_uploaded_file($file_temp, $path);
                        echo '<div class="alert alert-success">Pengajuan telah dikirim, silahkan tunggu informasi selanjutnya via email maksimal selama 3 hari.</div>';
                        echo '<meta http-equiv="refresh" content="5; ajukan.php "> ';
                    } else {
                        echo '<div class="alert alert-danger">Pengisian ada yang salah.</div>';
                        echo '<meta http-equiv="refresh" content="2; ajukan.php "> ';
                    }
                }
                ?>
                  
                <div class="form-group">
                    <label for="nama">Nama Lengkap <span class="harus">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                        placeholder="Taufik Hidayat" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="harus">*</span></label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                        placeholder="namasaya@gmail.com" size="13" required>
                        
                </div>

                <div class="form-group">
                    <label for="kampus">Instansi/Kampus <span class="harus">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="kampus" name="kampus"
                        placeholder="Unikom" required>
                </div>

                <div class="form-group">
                    <label>Sedang Penelitian <span class="harus">*</span></label>
                    <select name="idpenelitian" class="form-control form-control-sm" required>
                        <option value="">Pilih penelitian</option>
                        <?php
                        $tampil = $con->query("SELECT *  FROM jenis_penelitian");
                        while ($r = mysqli_fetch_assoc($tampil)) {
                            echo '<option value="' . $r['id_penelitian'] . '" >' . $r['nama_penelitian'] . ' - ' . $r['durasi_penelitian'] . ' Bulan </option>';
                        }
                        ?>
                    </select>
                    <span class="harus">Deskripsi</span><br>
                    <?php
                        $tampil = $con->query("SELECT * FROM jenis_penelitian");
                        while ($r = mysqli_fetch_assoc($tampil)) {
                            echo '<span class="badge badge-info mr-2 mt-2" data-toggle="tooltip" data-placement="bottom" title="' . $r['deskripsi'] . ' dengan durasi selama ' . $r['durasi_penelitian'] . ' bulan.">
                            ' . $r['nama_penelitian'] . ' </span>';
                        }
                        ?>
                </div>

                <div class="form-group">
                    <label for="surat">Upload Surat Lamaran <span class="harus">*</span></label>
                    <input type="file" class="form-control" id="surat" name="surat" required>
                </div>

                <button type="submit" class="btn btn-minat float-right" name="simpan">submit</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>