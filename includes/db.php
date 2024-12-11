<?php
$host = "localhost";
$user ="root";
$password = "abhishek";
$dbname = "User_management";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
	die("connection failed:  " . $conn->connect_error);
}
echo "Database connection successful!";
?>
