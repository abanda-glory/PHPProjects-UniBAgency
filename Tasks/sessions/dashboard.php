<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
} else {
    $current_time = time();
    $login_time = $_SESSION['login_time'];
    $seconds_logged_in = $current_time - $login_time;
    $minutes_logged_in = round($seconds_logged_in / 60);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <?php if ($seconds_logged_in < 60): ?>
            <p>You have been Logged in for <?php echo $seconds_logged_in; ?> seconds</p>
        <?php else: ?>
            <p>You have been Logged in for <?php echo $minutes_logged_in; ?> minutes </p>
        <?php endif; ?>

        <a href="logout.php">Logout</a>
    </div>
</body>

</html>