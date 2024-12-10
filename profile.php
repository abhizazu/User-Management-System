<?php
session_start();
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo "<h1>Welcome, {$user['username']}</h1>";
echo "<p>Email: {$user['email']}</p>";
?>

