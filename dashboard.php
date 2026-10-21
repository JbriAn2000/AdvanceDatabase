<?php
require_once __DIR__ . '/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter Exam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card dashboard">
            <img src="https://images.wallpapersden.com/image/download/hunter-x-hunter-anime_68556_1280x720.jpg" alt="Hunter x Hunter anime artwork" class="dashboard-image">
            <h1>Hunter Exam</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <p>You are logged in successfully.</p>

            <a href="logout.php" class="btn" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
        </div>
    </div>
</body>
</html>
