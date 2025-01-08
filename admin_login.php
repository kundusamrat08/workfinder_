<!-- admin_login.php -->
<?php
session_start();

if (isset($_SESSION['admin'])) {
    // If the admin is already logged in, redirect to the dashboard
    header("Location: admin_dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Implement admin authentication here
    // Check if username and password are valid
    // For example, you can compare them to hardcoded values for simplicity

    if ($username === 'admin' && $password === 'admin') {
        // Authentication successful
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="text-center">
                    <h1>Admin Login</h1>
                </div>
                
                <?php if (isset($error)) : ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="post">
                    <input type="text" class="form-control" name="username" placeholder="Username" required><br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required><br>
                    <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
