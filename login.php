<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set hardcoded credentials for testing
$hardcodedUsername = "admin";
$hardcodedPasswordHash = password_hash('1234', PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user using hardcoded credentials for testing
    if ($username === $hardcodedUsername && password_verify($password, $hardcodedPasswordHash)) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: ecommerce.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password";
    }
}

$conn->close();
?>
