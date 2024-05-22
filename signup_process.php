<?php
session_start();

// Menghubungkan ke database
$db = new mysqli("localhost", "root", "", "db_ddg");

// Mendapatkan input dari form
$username = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['kata_sandi'];

// Mengecek apakah input kosong
if (empty($username) || empty($email) || empty($password)) {
  $_SESSION['message'] = "Semua field harus diisi";
  header("location: signup.php");
  exit();
}

// Mengecek apakah email sudah digunakan
$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $_SESSION['message'] = "Email sudah digunakan";
  header("location: signup.php");
  exit();
}

// Membuat akun baru di database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed_password);
$stmt->execute();

$_SESSION['message'] = "Akun berhasil dibuat";
header("location: login.php");
exit();
?>
