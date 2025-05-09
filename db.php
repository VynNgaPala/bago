<?php
$servername = "localhost";
$username = "root"; // Adjust if needed
$password = ""; // Default for XAMPP
$dbname = "pathfinderdb"; // Matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
