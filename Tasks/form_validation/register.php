<?php
$errors = [];
$successMessage = "";

if (!empty($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $name = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $country = $_POST['country'];
    $otherCountry = trim($_POST['other-country']);

    //Validation Logic
    if (empty($name)) {
        $errors[] = "Full Name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Password do not match.";
    }

    if ($country == "#") {
        $errors[] = "Please select a country.";
    }

    if ($country == "Others" && empty($otherCountry)) {
        $errors[] = "You selected 'Others', please specify your country name.";
    }

    //Success Handling
    if (empty($errors)) {
        $successMessage = "Registration Successful!";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <h2>Registration Form</h2>
    <?php if ($successMessage): ?>
        <div class="success">
            Name: <?php echo htmlspecialchars($name); ?><br>
            Email: <?php echo htmlspecialchars($email); ?><br>
            Country: <?php echo htmlspecialchars($country == 'others' ? $otherCountry : $country); ?><br>
        </div>
    <?php else: ?>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="register.php" method="post">
            <label for="f-name">Full Name:</label>
            <input type="text" name="fname" placeholder="Enter Full Name..." id="f-name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter Email..." id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" minlength="6" placeholder="Enter Password..." id="password" required>
            <label for="c-pwd">Confirm Password:</label>
            <input type="password" name="confirm-password" placeholder="Confirm Password..." id="c-pwd" required>
            <label for="country">Country:</label>
            <select name="country" id="country">
                <option value="#">Select your Country</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Ghana">Ghana</option>
                <option value="Others">Others</option>
            </select>

            <div id="other-country-div">
                <label for="other-country">Please specify:</label>
                <input type="text" name="other-country" id="other-country" placeholder="Enter your country...">
            </div>

            <button type="submit" style="margin-top: 15px;">Register</button>
        </form>

    <?php endif; ?>
</body>

</html>