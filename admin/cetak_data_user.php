<?php
session_start();
include '../config.php';
$admin = $_SESSION['admin'];
// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('L', 'mm', 'A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial', 'B', 16);
// Membuat string
$pdf->Cell(280, 7, 'Rekap Data User yang telah terdaftar', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(290, 7, 'SMPN 22 BANDUNG', 0, 1, 'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 6, 'Dicetak pada tanggal:', 0, 0);
$pdf->Cell(25, 6, date('l, d F Y'), 0, 1);

// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(25, 6, 'No Induk', 1, 0);
$pdf->Cell(50, 6, 'Nama User', 1, 0);
$pdf->Cell(30, 6, 'Instansi', 1, 0);
$pdf->Cell(45, 6, 'Jurusan', 1, 0);
$pdf->Cell(25, 6, 'Sedang', 1, 0);
$pdf->Cell(25, 6, 'Durasi', 1, 0);
$pdf->Cell(25, 6, 'Pendidikan', 1, 0);
$pdf->Cell(45, 6, 'Email', 1, 0);


$pdf->SetFont('Arial', '', 10);
$query = mysqli_query($con, "SELECT * FROM user JOIN pengajuan using(id_pengajuan) JOIN jenis_penelitian using(id_penelitian)");
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->Cell(25, 6, $row['no_induk'], 1, 0);
    $pdf->Cell(50, 6, ucwords($row['nama']), 1, 0);
    $pdf->Cell(30, 6, ucwords($row['kampus']), 1, 0);
    $pdf->Cell(45, 6, ucwords($row['jurusan']), 1, 0);
    $pdf->Cell(25, 6, $row['nama_penelitian'], 1, 0);
    $pdf->Cell(25, 6, $row['durasi_penelitian'].' Bulan', 1, 0);
    $pdf->Cell(25, 6, ucwords($row['pendidikan']), 1, 0);
    $pdf->Cell(45, 6, $row['email'], 1, 0);
}

$pdf->Output();
