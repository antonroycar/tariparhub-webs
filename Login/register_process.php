<?php
// Include database connection code
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "grafiksensor";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform necessary input validation
    if (empty($username) || empty($password)) {
        echo "Registration failed. Please fill in all the fields.";
        exit();
    }

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM users WHERE username = ?";
    $stmt_check = $conn->prepare($check_username_query);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Username '$username' is already taken. Please choose a different username.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the user into the database
    $insert_query = "INSERT INTO users (username, password, id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssi", $username, $hashed_password, $id);

    if ($stmt->execute()) {
        echo "Registration successful ";
    } else {
        echo "Error creating user: " . $conn->error;
    }

    $stmt->close();
    $stmt_check->close();
}
?>
