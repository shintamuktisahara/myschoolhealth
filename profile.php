<?php
include 'session_check.php';
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
    </ul>
</nav>

<div class="profile-box">
    <img src="img/user.png" alt="Profile Logo">
    <?php
    echo "<h1>Profil Pengguna</h1>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";
    ?>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
    <!-- Label untuk Hapus Akun -->
    <a href="hapus_akun.php" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
        Hapus akun saya
    </a>
    <style>
        span a {
            color: white; /* Menjadikan teks berwarna putih */
            text-decoration: underline; /* Memberikan garis bawah pada teks */
        }

        span a:hover {
            color: #ddd; /* Warna teks saat hover, bisa diganti dengan warna lain */
        }
    </style>
</div>


<style>
   /* profile.css */
   body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif, sans-serif; /* Menggunakan font Arial */
    background-color: #fff200; /* Latar belakang warna kuning */
}

.profile-box {
    background-color: #d90429; /* Warna merah untuk kotak profil */
    color: #fff;
    width: 320px;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.profile-box img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.profile-box h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

h1 {
  text-align: center;
  color: #fff;
}
.profile-box .profile-info {
    background-color: #fff;
    color: #d90429;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: left;
    font-size: 16px;
}

.profile-box .profile-info label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.profile-box .profile-info p {
    margin: 0;
}

.profile-box button {
    background-color: #fff200; /* Warna kuning untuk tombol */
    color: #d90429;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.profile-box button:hover {
    background-color: #f5c000; /* Warna kuning lebih gelap untuk efek hover */
}
</style>
</body>
</html>