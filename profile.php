<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo "<h1>Welcome, {$user['username']}</h1>";
echo "<p>Email: {$user['email']}</p>";
echo "<a href ='logout.php'>Logout</a>";
?>

