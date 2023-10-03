<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "grafiksensor";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Function to create the default user
function createDefaultUser($conn) {
    $hashed_password = password_hash('pollungtaripar', PASSWORD_DEFAULT);
    $insert_default_user = "INSERT INTO users (username, password, id) VALUES ('tariparpollung27', '$hashed_password', 10)";

    if ($conn->query($insert_default_user) === TRUE) {
        echo "";
    } else {
        echo "Error creating default user: " . $conn->error;
    }
}

// Check if the default user exists, if not, create it
$sql_check_default_user = "SELECT * FROM users WHERE username = 'tariparpollung27'";
$result_check_default_user = $conn->query($sql_check_default_user);

if ($result_check_default_user->num_rows === 0) {
    createDefaultUser($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // Assuming you have a form field named 'username'
    $password = $_POST['password'];  // Assuming you have a form field named 'password'

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect to the dashboard upon successful login
            exit();
        } else {
            echo "<script>alert('Login gagal. Password salah.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Login gagal. Pengguna tidak ditemukan.'); window.location.href='login.php';</script>";
        exit();
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Gaya CSS untuk logo "Del" */
        #del-logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 50px; /* Sesuaikan dengan ukuran yang Anda inginkan */
            height: 50px; /* Sesuaikan dengan ukuran yang Anda inginkan */
            z-index: 2;
        }

        /* Gaya CSS untuk meresize gambar */
        #wave {
            width: 100px; /* Sesuaikan ukuran yang Anda inginkan */
            height: auto; /* Ukuran tinggi akan disesuaikan secara proporsional */
        }

        #bg {
            width: 100px; /* Sesuaikan ukuran yang Anda inginkan */
            height: auto; /* Ukuran tinggi akan disesuaikan secara proporsional */
        }

        /* Gaya CSS untuk tombol toggle password */
        .toggle-password {
            cursor: pointer;
        }

        /* Gaya CSS untuk memperbesar logo Taripar Hub */
        #taripar-logo {
            width: 400px; /* Sesuaikan ukuran yang Anda inginkan */
            height: auto; /* Ukuran tinggi akan disesuaikan secara proporsional */
        }

        /* Gaya CSS untuk mengubah tampilan teks "Taripar Hub" */
        .title {
            text-transform: none !important; /* Mengabaikan perubahan gaya huruf */
            font-size: 18px; /* Ukuran teks baru (misalnya, 18px) */
        }

        /* Gaya CSS untuk mengubah ukuran teks "Username" dan "Password" */
        .input-div h5 {
            font-size: 14px; /* Ukuran teks baru (misalnya, 14px) */
        }
        /* Gaya CSS untuk menggeser gambar bg.svg ke kanan */
   /* Gaya CSS untuk menggeser gambar bg.svg ke kanan */
   .img {
    margin-right: 5 px; /* Sesuaikan nilai margin yang Anda inginkan */
}


    </style>
</head>
<body>

<img class="wave" src="img/wave.png">
<div class="container">
    <div class="img">
        <img src="img/bg.svg">
    </div>
    <div class="login-content">
    <form id="login-form"  method="POST">
        <img src="img/taripar.png" id="taripar-logo" style="padding-right: 40px;">
        <h2 class="title" style="font-family: Arial;">Taripar Hub</h2>
        <div class="input-div one">
    <div class="i">
        <i class="fas fa-user"></i>
    </div>
    <div class="div" style="font-family: Arial;">
        <h5 style="font-family: Arial;">Username</h5>
        <input type="text" class="input" name="username" required style="font-family: Arial;">
    </div>
</div>
<div class="input-div pass">
    <div class="i">
        <i class="fas fa-lock"></i>
        <span id="togglePassword" class="toggle-password" onclick="togglePasswordField()"></span>
    </div>
    <div class="div" style="font-family: Arial;">
        <h5 style="font-family: Arial;">Password</h5>
        <input type="password" class="input" name="password" required style="font-family: Arial;">
    </div>
</div>


        <input type="submit" class="btn" value="Login" style="font-family: Arial;">
</form>
</div>

    <!-- Tambahkan logo "Del" di sini -->
    <img src="img/del.jpg" id="del-logo" style="width: 75px; height: 75px;">
</div>
<script type="text/javascript" src="js/main.js"></script>
<script>
    function loginUser() {
        // Simpan username dan password yang dimasukkan oleh pengguna
        var enteredUsername = document.getElementById('username').value;
        var enteredPassword = document.getElementById('password').value;

        // Lakukan pemeriksaan autentikasi sederhana (ganti ini sesuai kebutuhan Anda)
        if (enteredUsername === "username" && enteredPassword === "password") {
            // Autentikasi berhasil, simpan sesi atau cookie`
            sessionStorage.setItem('loggedIn', 'true');
            // Redirect ke halaman Charts jika autentikasi berhasil
            window.location.href = 'dashboard.php';
        } else {
            // Autentikasi gagal, tampilkan pesan kesalahan
            alert('Username or password is incorrect. Please try again.');
        }

        // Menghentikan pengiriman form
        return false;
    }

    function togglePasswordField() {
        var passwordField = document.getElementById('password');
        var togglePassword = document.getElementById('togglePassword');

        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

    
</script>
</body>
</html>
