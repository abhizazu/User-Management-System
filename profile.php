<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Welcome, <?= $user['username'] ?></h1>
        <p>Email: <?= $user['email'] ?></p>
        <a href="logout.php">Logout</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
