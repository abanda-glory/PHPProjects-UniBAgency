<?php
// Handle Cookie Reset
if (isset($_GET['reset'])) {
    setcookie('user_theme', '', time() - 3600, "/");
    setcookie('last_visit', '', time() - 3600, "/");
    header("Location: cookie_demo.php");

    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $selected_theme = $_POST['theme'];
    $current_time = date('Y-m-d H:i:s');

    setcookie('user_theme', $selected_theme, time() + (86400 * 30), "/");
    setcookie('last_visit', $current_time, time() + (86400 * 30), "/");
    header("Location: cookie_demo.php");

    exit;
}

// Retrieve values for the UI
$theme = $_COOKIE['user_theme'] ?? 'light';
$last_visit = $_COOKIE['last_visit'] ?? null;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie Theme Demo</title>
    <style>
        /* 5. Theme Definitions */
        /* These classes change the colors based on the body class */
        .theme-light {
            background: #ffffff;
            color: #333;
        }

        .theme-dark {
            background: #222222;
            color: #eee;
        }

        .theme-blue {
            background: #004488;
            color: #fff;
        }

        body {
            font-family: Arial, sans-serif;
            transition: 0.3s;
            padding: 50px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
    </style>
</head>

<body class="theme-<?php echo htmlspecialchars($theme); ?>">
    <div class="container">
        <?php if ($last_visit): ?>
            <p><strong>Welcome back!</strong><br>Last visit: <?php echo $last_visit; ?></p>
        <?php else: ?>
            <p>Welcome! This is your first visit.</p>
        <?php endif; ?>

        <form action="cookie_demo.php" method="post">
            <label for="theme">Preferred Theme:</label>
            <select name="theme" id="theme">
                <option value="light" <?php if ($theme == 'light') echo 'selected'; ?>>Light</option>
                <option value="dark" <?php if ($theme == 'dark') echo 'selected'; ?>>Dark</option>
                <option value="blue" <?php if ($theme == 'blue') echo 'selected'; ?>>Blue</option>
            </select>
            <br><br>
            <button type="submit">Save Preference</button>
        </form>

        <br>
        <a href="cookie_demo.php?reset=1" style="color: red;">Reset Cookies (Delete Data)</a>
    </div>

</body>

</html>