<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'includes/db.php'; // Ensure the database file path is correct

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?= htmlspecialchars($user['username']); ?></h1>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role']); ?></p>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
