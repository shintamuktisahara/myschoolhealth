<?php
require('fpdf.php'); // Sertakan file FPDF

// Memulai koneksi ke database
include "koneksi.php"; // Sesuaikan dengan file koneksi database Anda

class PDF extends FPDF {
    // Header
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Daftar Kunjungan', 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman '.$this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

// Header tabel
$pdf->Cell(10, 10, 'No', 1);
$pdf->Cell(40, 10, 'Nama Siswa', 1);
$pdf->Cell(20, 10, 'Kelas', 1);
$pdf->Cell(30, 10, 'Tanggal', 1);
$pdf->Cell(50, 10, 'Keluhan', 1);
$pdf->Cell(40, 10, 'Nama Obat', 1);
$pdf->Ln();

// Mengambil data kunjungan
$query = "SELECT kunjungan.*, IFNULL(stok_obat.nama_obat, 'Tidak Perlu Obat') AS nama_obat 
          FROM kunjungan 
          LEFT JOIN stok_obat ON kunjungan.id_obat = stok_obat.id_obat";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $no++, 1);
        $pdf->Cell(40, 10, $row['nama_siswa'], 1);
        $pdf->Cell(20, 10, $row['kelas'], 1);
        $pdf->Cell(30, 10, $row['tanggal'], 1);
        $pdf->Cell(50, 10, $row['keluhan'], 1);
        $pdf->Cell(40, 10, $row['nama_obat'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'Tidak ada data kunjungan yang tersedia.', 1, 1, 'C');
}

$pdf->Output('D', 'Daftar_Kunjungan.pdf'); // Mengunduh file dengan nama Daftar_Kunjungan.pdf
?>
