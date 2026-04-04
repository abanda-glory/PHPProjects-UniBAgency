<?php
// Loops through numbers from 1 to 50 and displays if number is even or odd
$sum = 0;
$even_nums = 0;
$odd_nums = 0;
$prime_nums = 0;

for ($num = 1; $num <= 50; $num++) {
    // Check Even/Odd
    if ($num % 2 == 0) {
        echo "$num is even <br>";
        $even_nums++;
    } else {
        echo "$num is odd <br>";
        $odd_nums++;
    }

    $sum += $num;

    // 2. Prime Number Logic
    if ($num > 1) {
        $is_prime = true;

        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $is_prime = false;
                break;
            }
        }

        if ($is_prime) {
            echo "$num is prime <br>";
            $prime_nums++;
        } else {
            echo "$num is not prime <br>";
        }
    }
}

echo "The sum of numbers from 1 to 50 is: $sum <br>";
echo "Total even numbers: $even_nums <br>";
echo "Total odd numbers: $odd_nums <br>";
echo "Total prime numbers: $prime_nums <br>";
