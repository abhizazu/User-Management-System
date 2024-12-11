<?php
$host = "localhost";
$user = "root"; // Replace with your database username
$password = "abhishek"; // Replace with your database password
$dbname = "user_management"; // Ensure this matches your database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
