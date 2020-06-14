<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 mt-5 text-gray-800">Jadwal</h1>
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="text-gray">Data Jadwal</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Agenda</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $con->query("SELECT * FROM agenda  ORDER BY id_agenda DESC");
                while ($isi = mysqli_fetch_assoc($tampil)) {

                  ?>
                <tr>
                  <td> <?= $no++; ?>.</td>
                  <td> <?= $isi["judul_agenda"]; ?></td>
                  <td> <?php
                          $date = date_create($isi['tanggal']);
                          echo date_format($date, "l, d F Y");
                        ?> 
                  </td>
                  <td> Jam <?php
                          $date = date_create($isi['waktu']);
                          echo date_format($date, "H:i");
                        ?>
                  </td>
                  <td> <?= $isi["tempat"]; ?></td>
                  <td> <?= $isi["status"]; ?></td>
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
<?php include 'footer.php'; ?>