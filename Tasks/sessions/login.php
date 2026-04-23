<?php

session_start();

$errors = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $password = $_POST['password'];

    if ($username == "tohkuh" && $password == "password123") {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();

        header('Location: dashboard.php');

        exit;
    } else {
        $errors = "Invalid username or password";
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php if (!empty($errors)): ?>
            <p><?php echo $errors; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username..." required>
            <label for="pwd">Password:</label>
            <input type="password" name="password" id="pwd" minlength="8" placeholder="Enter password..." required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>