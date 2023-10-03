<?php
// Hubungkan ke database Anda
$servername = "localhost"; // Ganti sesuai dengan pengaturan database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "taripar"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil data yang dikirim oleh form login
$enteredUsername = $_POST['Username'];
$enteredPassword = $_POST['Password'];

// Lakukan pemeriksaan autentikasi dengan database Anda
$sql = "SELECT * FROM login WHERE Username = '$enteredUsername' AND Password = '$enteredPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Autentikasi berhasil, simpan sesi atau cookie
    session_start();
    $_SESSION['loggedIn'] = true;
    header("Location: Dashboard.php"); // Redirect ke halaman Dashboard.php
    exit();
} else {
    // Autentikasi gagal, tampilkan pesan kesalahan
    echo "Username or Password is incorrect. Please try again.";
}

$conn->close();
?>
