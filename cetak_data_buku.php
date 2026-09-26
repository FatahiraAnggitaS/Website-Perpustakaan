<?php
// Memanggil file koneksi
include_once("koneksi.php");

// Memanggil pustaka FPDF
require('fpdf/fpdf.php');

// Membuat objek PDF baru
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Header PDF
$pdf->Cell(0, 10, 'Laporan Data Buku - GIT L!BRARY', 0, 1, 'C');
$pdf->Ln(5); // Spasi kosong

// Header tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Judul Buku', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Penulis', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Penerbit', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Tahun', 1, 1, 'C', true);

// Mengambil data dari database
$result = mysqli_query($con, "SELECT * FROM buku");
$no = 1;

// Isi tabel
$pdf->SetFont('Arial', '', 10);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(10, 10, $row['id_buku'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['judul'], 1, 0, 'L');
    $pdf->Cell(45, 10, $row['penulis'], 1, 0, 'L');
    $pdf->Cell(35, 10, $row['penerbit'], 1, 0, 'L');
    $pdf->Cell(20, 10, $row['th_terbit'], 1, 1, 'C');
}

// Output PDF
$pdf->Output('I', 'Laporan_Data_Buku.pdf');
?>
