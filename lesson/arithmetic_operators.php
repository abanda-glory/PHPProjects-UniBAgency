<?php
// Arithmetic Operators
$x = 10;
$y = 2;
$z = null;

$z = $x + $y; // Addition
echo "The sum of $x and $y is: $z<br>";

$z = $x - $y; // Subtraction
echo "The difference of $x and $y is: $z<br>";

$z = $x * $y; // Multiplication
echo "The product of $x and $y is: $z<br>";

$z = $x / $y; // Division
echo "The quotient of $x and $y is: $z<br>";

$z = $x % $y; // Modulo
echo "The remainder of $x divided by $y is: $z<br>";

// Exponentiation
$z = $x ** $y; // Exponentiation    
echo "$x raised to the power of $y is: $z<br>";

// Increment operators
$counter = 4;
$counter++; //same as $counter = $counter + 1;   
echo $counter . "<br>";

// Decrement operators
$counter = 5;
$counter--; //same as $counter = $counter - 1;
echo $counter;

// operator precedence in descending order
// Parentheses()
// Exponentiation **
// Multiplication * 
// Division / 
// Modulo %
// Addition +
// Subtraction -
