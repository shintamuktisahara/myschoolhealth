<?php
include 'koneksi.php';

// Fungsi untuk menampilkan data
function display_data($conn) {
    $query = "SELECT * FROM health_info";
    $result = mysqli_query($conn, $query);

    echo '<h2>Informasi Kesehatan</h2>';
    echo '<div class="health-info">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="blob">';
        echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
        echo '<p>' . htmlspecialchars($row['content']) . '</p>';
        echo '<a href="?action=edit&id=' . $row['id'] . '">Edit</a> | ';
        echo '<a href="?action=delete&id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>';
        echo '</div>';
    }
    echo '</div>';
    echo '<a href="?action=add">Tambah Informasi Baru</a>';
}

// Fungsi untuk menambah data
function add_form() {
    echo '<h2>Tambah Informasi Baru</h2>';
    echo '<form method="post" action="?action=save">';
    echo '<label for="title">Judul:</label><br>';
    echo '<input type="text" name="title" required><br>';
    echo '<label for="content">Isi:</label><br>';
    echo '<textarea name="content" required></textarea><br>';
    echo '<button type="submit">Simpan</button>';
    echo '</form>';
}

// Fungsi untuk mengedit data
function edit_form($conn, $id) {
    $query = "SELECT * FROM health_info WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    echo '<h2>Edit Informasi</h2>';
    echo '<form method="post" action="?action=update">';
    echo '<input type="hidden" name="id" value="' . $data['id'] . '">';
    echo '<label for="title">Judul:</label><br>';
    echo '<input type="text" name="title" value="' . htmlspecialchars($data['title']) . '" required><br>';
    echo '<label for="content">Isi:</label><br>';
    echo '<textarea name="content" required>' . htmlspecialchars($data['content']) . '</textarea><br>';
    echo '<button type="submit">Update</button>';
    echo '</form>';
}

// Proses tambah atau update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_GET['action'] == 'save') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        $query = "INSERT INTO health_info (title, content) VALUES ('$title', '$content')";
        mysqli_query($conn, $query);
        header('Location: health_info.php');
    }

    if ($_GET['action'] == 'update') {
        $id = $_POST['id'];
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        $query = "UPDATE health_info SET title='$title', content='$content' WHERE id=$id";
        mysqli_query($conn, $query);
        header('Location: health_info.php');
    }
}

// Proses hapus data
if ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM health_info WHERE id = $id";
    mysqli_query($conn, $query);
    header('Location: health_info.php');
}

// Logika Tampilan
if (!isset($_GET['action'])) {
    display_data($conn);
} elseif ($_GET['action'] == 'add') {
    add_form();
} elseif ($_GET['action'] == 'edit' && isset($_GET['id'])) {
    edit_form($conn, $_GET['id']);
}
?>
