<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="h4 mt-5 text-gray-800 ">Absensiku</h1>
            <p class="subjudul">Informasi valid adalah kunci keberhasilan</p>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="text-gray">Data Absen</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari, Tanggal</th>
                                    <th>Jam Absen Masuk</th>
                                    <th>Status Masuk</th>
                                    <th>Tanggal Dikonfirmasi Oleh Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $id_user = $_SESSION['username'];
                                $tampil = $con->query("SELECT * FROM absen WHERE id_user ='$id_user' ORDER BY id_absen DESC");
                                while ($isi = mysqli_fetch_assoc($tampil)) {
                                ?>
                                <tr>
                                    <td> <?= $no++; ?>.</td>
                                    <td>
                                        <?php
                                        $date = date_create($isi['tanggal_absen']);
                                        echo date_format($date, "l, d F Y");?>
                                    </td>
                                    <td>
                                        <?php
                                        $date = date_create($isi['jam_masuk']);
                                        echo date_format($date, "H:i");?>
                                    </td>
                                    <td> <?= ucwords($isi["status_masuk"]); ?></td>
                                    <td>
                                    <?php
                                    if ($isi['status_masuk'] == 'menunggu konfirmasi') {  ?>
                                            Masih belum dikonfirmasi
                                        <?php
                                        } else {   
                                        ?>
                                            <?= $isi["tanggal_acc"]; ?>
                                        <?php
                                        } 
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php include 'footer.php'; ?>