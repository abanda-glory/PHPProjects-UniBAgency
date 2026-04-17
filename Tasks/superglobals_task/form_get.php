<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Form</title>
</head>

<body>
    <form action="form_get.php" method="GET">
        <label for="">Name</label>
        <input type="text" name="user-name">
        <label for="">City</label>
        <input type="text" name="city">
        <label for="">Age</label>
        <input type="number" name="age">

        <button type="submit">Get Result</button>
    </form>
</body>

</html>

<?php
echo "Method Used: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Browser Used: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";

if (!empty($_GET)) {
    echo "Name: " . $_GET['user-name'] . "<br>";
    echo "City: " . $_GET['city'] . "<br>";
    echo "Age: " . $_GET['age'] . "<br>";
}

?>