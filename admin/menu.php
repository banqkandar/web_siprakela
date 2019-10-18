<?php include "../config.php"; ?>
    <div class="sidebar-heading mt-2">
        Main menu
    </div>
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <span>Kelola Info</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="user.php">
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="absen.php">
        <?php
            $notif = $con->query("SELECT COUNT(*) FROM absen WHERE status_masuk = 'Belum Absen Masuk' ");
            $row = mysqli_fetch_row($notif);
            $hasil = $row[0];
        ?>
            <span>Absen<span class="badge badge-danger badge-counter mr-2"><?= $hasil; ?> belum konfirmasi</span></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="jadwal.php">
            <span>Jadwal</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="pembimbing.php">
            <span>Kelola Pembimbing</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="penilaian.php">
            <span>Grade</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading mt-2">
        Akun saya
    </div>
    <li class="nav-item">
        <a class="nav-link" href="editprofil.php">
            <span>Edit profil</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../logout.php">
            <span>Keluar</span>
        </a>
    </li>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">