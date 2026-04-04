<?php
// strings declarations
$name = "Alice";
$food = "pizza";
$email = "alice@gmail.com";

// Interger variables
$age = 30;
$users = 2;
$quantity = 5;

// float variables
$gpa = 3.5;
$price = 19.99;
$tax_rate = 5.1;

// boolean variables
$employed = true;
$online = false; //On the browser, false is shown as empty and true is shown as 1
$for_sale = true;

echo "Hello, $name! Welcome to PHP programming. <br>";
echo "You love $food, don't you? <br>";
echo "Your email address is $email. <br>";

echo "You are $age years old. <br>";
echo "There are $users users online. <br>";
echo "You have ordered $quantity items. <br>";

echo "Your GPA is $gpa. <br>";
echo "The price of the item is \$ $price. <br>";
echo "The sales tax rate is: $tax_rate%. <br>";

echo "Online status: $online.<br>";
echo "Employed status: $employed.<br>";
echo "For sale status: $for_sale.<br>";

echo "You have ordered $quantity x $foods <br>";

$total_price = $quantity * $price;

echo"Your total price is \$ $total_price. <br>";
