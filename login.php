<?php
include 'koneksi.php';

session_start(); // Pastikan session dimulai di sini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE email = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        header("Location: profile.php");
        exit();
    } else {
        $error_message = "Login gagal. Email atau password salah.";
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School Health - Log In</title>
    <style>
        body {
            background-color: #fff200; /* Warna kuning untuk latar belakang */
            font-family: 'Lucida Sans', sans-serif; /* Font untuk tampilan */
            color: #d90429; /* Warna merah untuk teks */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #d90429; /* Warna merah untuk latar belakang form */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] { /* Tambahkan input type text */
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #fff;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box; /* Menjaga ukuran input */
        }

        /* CSS untuk checkbox */
        input[type="checkbox"] {
            cursor: pointer;
            margin-right: 5px;
        }

        /* Styling label untuk checkbox */
        label[for="showPassword"] {
            display: inline-block;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background-color: #fff200; /* Warna kuning untuk tombol */
            color: #d90429;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f5c000; /* Warna kuning lebih gelap untuk efek hover */
        }

        .error-message {
            color: #ffcc00; /* Warna kuning untuk pesan kesalahan */
            margin-bottom: 15px; /* Jarak antara pesan dan elemen lainnya */
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" id="password" required><br>
        
        <div style="display: flex; align-items: center;">
            <input type="checkbox" id="showPassword" onclick="togglePassword()">
            <label for="showPassword" style="margin-left: 5px;">Lihat Password</label>
        </div>

        <button type="submit">Login</button>
        <div style="text-align: center; margin-top: 15px;">
            Belum punya akun? 
            <a href="signup.php" style="color: #fff200; text-decoration: italic;">Sign Up</a>
        </div>
    </form>

    <script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        passwordInput.type = (passwordInput.type === "password") ? "text" : "password";
    }
    </script>
</body>
</html>
