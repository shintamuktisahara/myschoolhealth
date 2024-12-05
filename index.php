<?php
session_start();
?>
<?php
include 'koneksi.php';

// Query untuk mengambil data
$query = "SELECT * FROM health_info";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School Health</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <div class="logo-website">
        <img src="img/logo.png" alt="Logo">
        <span>My School Health</span>
    </div>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        
        <?php if (isset($_SESSION['email'])): ?>
            <li class="dropdown">
                <a href="#">Kunjungan</a>
                <ul>
                    <li><a href="tambahkunjungan.php">Tambah</a></li>
                    <li><a href="daftarkunjungan.php">Lihat</a></li>
                    <li><a href="editkunjungan.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Stok Obat</a>
                <ul>
                    <li><a href="tambahstokobat.php">Tambah</a></li>
                    <li><a href="lihatstokobat.php">Lihat</a></li>
                    <li><a href="editstokobat.php">Edit</a></li>
                </ul>
            </li>
            <li><a href="profile.php" class="profile"><img src="img/user.png" alt="user"></a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        <?php endif; ?>
    </ul>
</nav>

<body>
    <div class="container">
     <div class="logo">
      <img height="150" src="img/logo.png" width="150"/> <!-- Gambar logo dengan ukuran tertentu -->
     </div>
     <div class="content">
      <div class="title">
       MY SCHOOL HEALTH <!-- Judul utama halaman -->
      </div>
      <div class="subtitle">
       PMR SMKN 1 CILEGON <!-- Subtitle atau keterangan tambahan -->
      </div>
      <div class="quote">
       “Gunakan Masa Sempat mu sebelum masa sempit mu dan buktikan bahwa kita BISA!” <!-- Kutipan motivasi -->
      </div>
     </div>
     <div class="image-container">
      <img height="300" src="img/anggota.jpg" width="300"/> <!-- Gambar dengan ukuran tertentu -->
     </div>
    </div>
    <br></br>
    <br></ br>
<div class="health-info-container">
    <!-- Informasi Kesehatan -->
    <h2>Informasi Kesehatan</h2>
    <div class="health-info-grid">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="health-info-blob">
                <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                <p><?php echo htmlspecialchars($row['content']); ?></p>
            </div>
        <?php } ?>
    </div>
</div>

</body>
<br>
<!-- Footer -->
<footer>
    <div class="contact">
      <h3>Kontak</h3>
      <ul>
        <li><a href="https://wa.me/089605525328"> <img height="30" src="img/wa.png" width="30"/></a></li> <!-- Ikon WhatsApp -->
        <li><a href="mailto:email@smkn1cilegon.pmr.com"> <img height="30" src="img/gmail.png" width="30"/></a></li> <!-- Ikon email -->
      </ul>
    </div>
    <div class="address">
      <h3>Alamat</h3>
      <p>UKS SMK Negeri 1 Cilegon</p> <!-- Alamat UKS -->
    </div>
    <div class="social-media">
      <h3>Sosial Media</h3>
      <ul>
        <li><a href="https://youtube.com/@pmrsmkn1cilegon?si=W6LMmqlFh-3nR1qy"> <img height="30" src="img/youtube.png" width="30"/></a></li> <!-- Ikon YouTube -->
        <li><a href="https://www.tiktok.com/@pmr..smkn1cilegon?_t=8qRcT61Z1Ag&_r=1"> <img height="30" src="img/tiktok.png" width="30"/></a></li> <!-- Ikon TikTok -->
        <li><a href="https://www.instagram.com/pmr.smkn1cilegon?igsh=MXRrYTF6cmQ2bzQ5eg=="> <img height="30" src="img/instagram.png" width="30"/></a></li> <!-- Ikon Instagram -->
      </ul>
    </div>
</footer>
<!-- Akhir footer -->

<script src="script.js"></script> <!-- Menyertakan file JavaScript eksternal -->
<style>
 /* Container utama untuk Informasi Kesehatan */
.health-info-container {
  max-width: 1000px; /* Lebar maksimum */
  margin: 0 auto;   /* Pusatkan elemen */
  padding: 20px;    /* Jarak dalam */
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif, sans-serif; /* Menggunakan font Arial */
  color: #333;      /* Warna teks default */
  background-color: #f7f7f7; /* Latar belakang kontainer */
  border-radius: 10px; /* Sudut membulat */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
  text-align: center; /* Pusatkan teks heading */
}

/* Heading utama */
.health-info-container h2 {
  color:  #f44336; /* Hijau untuk kesan sehat */
  margin-bottom: 20px; /* Jarak bawah */
  font-size: 24px; /* Ukuran font */
}

/* Bagian informasi kesehatan */
.health-info-grid {
  display: grid; /* Gunakan grid untuk tata letak */
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Kotak horizontal */
  gap: 20px; /* Jarak antar kotak */
  padding: 10px;
}

/* Blob (kotak informasi) */
.health-info-blob {
  background-color: #ffeb3b;; 
  border: 1px solid  #ffeb3b; 
  border-radius: 8px; /* Sudut membulat */
  padding: 15px; /* Jarak dalam */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan halus */
  transition: transform 0.2s, box-shadow 0.2s; /* Efek transisi */
}

/* Hover untuk Blob */
.health-info-blob:hover {
  transform: scale(1.05); /* Perbesar sedikit */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan lebih kuat */
  background-color:  #e7de89; /* Ubah warna latar saat hover */
}

/* Judul dalam Blob */
.health-info-blob h4 {
  margin: 0 0 10px; /* Jarak bawah */
  font-size: 18px; /* Ukuran font */
  color: #333; /* Warna teks */
  font-weight: bold; /* Teks tebal */
}

/* Konten dalam Blob */
.health-info-blob p {
  margin: 0; /* Hapus margin */
  font-size: 14px; /* Ukuran font */
  color: #555; /* Warna abu-abu gelap */
  line-height: 1.5; /* Jarak antar baris */
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
  .health-info-container {
      padding: 10px; /* Kurangi jarak dalam */
  }

  .health-info-grid {
      grid-template-columns: 1fr; /* Satu kolom untuk layar kecil */
  }

  .health-info-blob h4 {
      font-size: 16px; /* Ukuran font lebih kecil */
  }

  .health-info-blob p {
      font-size: 13px; /* Ukuran font lebih kecil */
  }
}


</style>
</body>
</html>
