<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $success = "User registered successfully.";
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="login-container">
        <h1>Register</h1>
        <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
        <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
