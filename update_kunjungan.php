<?php
include 'koneksi.php';

// Periksa apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kunjungan = (int) $_POST['id_kunjungan'];
    $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $keluhan = mysqli_real_escape_string($koneksi, $_POST['keluhan']);
    $id_obat = empty($_POST['id_obat']) ? 'NULL' : (int) $_POST['id_obat']; // Tangani jika obat tidak dipilih

    // Query update
    $query = "UPDATE kunjungan 
              SET nama_siswa = '$nama_siswa', 
                  kelas = '$kelas', 
                  tanggal = '$tanggal', 
                  keluhan = '$keluhan', 
                  id_obat = $id_obat 
              WHERE id_kunjungan = $id_kunjungan";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        header("Location: editkunjungan.php?message=success"); // Redirect jika berhasil
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
