<?php
session_start();

// Menghubungkan ke database
$db = new mysqli("localhost", "root", "", "db_ddg");

// Mendapatkan input dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek apakah input kosong
if (empty($username) || empty($password)) {
    $_SESSION['message'] = "Username dan password harus diisi";
    header("location: login.php");
    exit();
}

// Mengecek apakah pengguna ada di database
$stmt = $db->prepare("SELECT * FROM users WHERE (username = ? OR email = ?)");
$stmt->bind_param("ss", $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION['message'] = "Username atau password salah";
    header("location: login.php");
    exit();
}

$user = $result->fetch_assoc();
if (password_verify($password, $user['password'])) {
    // Menyimpan informasi pengguna ke session
    $_SESSION['user'] = $user['username'];
    $_SESSION['message'] = "Login berhasil";
    header("location: index.php");
    exit();
} else {
    $_SESSION['message'] = "Username atau password salah";
    header("location: login.php");
    exit();
}
?>
