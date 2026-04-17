<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="form_post.php" method="post">
        <label>Name</label>
        <input type="text" name="user-name">
        <label>City</label>
        <input type="text" name="city">
        <label for="">Age</label>
        <input type="number" name="age">

        <input type="hidden" name="action" value="submit">

        <button type="submit">Submit</button>
    </form>
</body>

</html>

<?php
echo "Method Used: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Browser Used: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";

echo "<hr>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Name: " . htmlspecialchars($_POST['user-name']) . "<br>";
    echo "City: " . htmlspecialchars($_POST['city']) . "<br>";
    echo "Age: " . htmlspecialchars($_POST['age']) . "<br>";
    echo "Action: " . htmlspecialchars($_POST['action']) . "<br>";
}
?>