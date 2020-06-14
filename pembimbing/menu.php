<?php include "../config.php"; ?>
    <div class="sidebar-heading mt-2">
        Main menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="agenda.php">
        <?php
            $notif = $con->query("SELECT COUNT(*) FROM agenda ");
            $row = mysqli_fetch_row($notif);
            $hasil = $row[0];
            ?>
        <span>Jadwal<span class="badge badge-danger badge-counter mr-2"><?= $hasil; ?> NEW</span></span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="penilaian.php">
            <span>Penilaian</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading mt-2">
        Log out
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Keluar
        </a>
    </li>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar??</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika anda memang ingin mengakhiri sesi ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn badge-danger badge-counter" href="../logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>