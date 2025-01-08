<?php
session_start();

if (!isset($_SESSION['admin'])) {
    // If the admin is not logged in, redirect to the login page
    header("Location: admin_login.php");
    exit();
}

if (isset($_POST['logout'])) {
    // Destroy the admin session and redirect to the login page
    session_destroy();
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Logout</title>
</head>
<body>
    <h1>Admin Logout</h1>

    <!-- Logout button -->
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
