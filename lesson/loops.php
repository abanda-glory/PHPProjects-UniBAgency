<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="loops.php" method="post">
        <label for="">Enter a number to count down from:</label>
        <input type="text" name="counter">
        <input type="submit" value="start">

    </form>
</body>

</html>

<?php
$counter = $_POST["counter"];
// for loop
for ($i = $counter; $i > 0; $i--) {
    echo $i . "<br>";
}

// while loop
$seconds = 0;
$running = true;
while ($running) {

    // wait for 1 second
    $seconds++;
    echo $seconds . "<br>";
}
?>