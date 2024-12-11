<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hashing the password

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Code for handling form submission
} else {
        echo "<p style='color: red;'>Invalid email or password.</p>";
    }
} else {
    echo "<p style='color: red;'>Invalid request.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <form method="POST" action="index.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
