<?php
session_start();
include 'koneksi/db.php';

// ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// cek user di database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// cek apakah user ada dan password benar
if ($data && password_verify($password, $data['password'])) {
    $_SESSION['user'] = $data['username'];
    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "Login gagal. Username atau password salah.";
    header("Location: index.php");
    exit;
}
?>
