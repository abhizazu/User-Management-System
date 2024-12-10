<?php
session_start();
include 'includes/db.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: profile.php");
    exit;
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<h1>User Management</h1>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['username']}</td>
        <td>{$row['email']}</td>
        <td>{$row['role']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> | 
            <a href='delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
echo "</table>";
?>
