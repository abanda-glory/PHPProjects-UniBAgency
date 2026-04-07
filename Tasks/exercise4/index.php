<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FizzBuzz</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <button type="submit">Submit</button>
    </form>

    <hr> <?php
            // Only run the logic if the form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Grab the number from the post request
                $n = $_POST["number"];

                // Loop from 1 to N
                for ($i = 1; $i <= $n; $i++) {
                    if ($i % 3 == 0 && $i % 5 == 0) {
                        echo "<strong>FizzBuzz</strong> <br>";
                    } elseif ($i % 3 == 0) {
                        echo "<strong>Fizz</strong> <br>";
                    } elseif ($i % 5 == 0) {
                        echo "<strong>Buzz</strong> <br>";
                    } else {
                        echo $i . "<br>";
                    }
                }
            }
            ?>
</body>

</html>