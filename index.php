<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$email = $_POST ['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT  * FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if (password_verify($_POST['password'], $row['password'])) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid password.";
}
} else {
	echo "No user found with this email.";
}
?>

<!DOCTYPE html>
,html.
<head>
	<title>Login</title>
</head>
<body>
<form method="POST" action="index.php">
	<input type="email" name="email"placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>
</body>
</html>

