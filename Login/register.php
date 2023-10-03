<?php
session_start();

// Check if the user is logged in and has the appropriate username
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'tariparpollung27') {
    header('Location: error_page.php'); // Redirect to an error page
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h2>Registrasi Pengguna</h2>
    <form action="register_process.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Registrasi">
    </form>
</body>
</html>
