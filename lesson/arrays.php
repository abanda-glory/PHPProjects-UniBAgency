<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ARRAYS</title>
</head>

<body>
    <form action="arrays.php" method="post">
        <label for="">Enter a country</label>
        <input type="text" name="country" id="country">
        <input type="submit">
    </form>
</body>

</html>


<?php
//array: variable that can hold more than one value at a time

$fruits = array("apple", "orange", "banana", "coconuts");

// $fruits[0] = "Pineapple"; //replaces apple
// array_push($fruits, "Kiwi", "apple");// adds elements to the end f array
// array_pop($fruits);//removes last element in array
// array_shift($fruits);//removes first array element

// $reversed_fruits = array_reverse($fruits); //reverses existing array by creating a new array
// foreach ($reversed_fruits as $reversed_fruit) {
//     echo "reversed_fruit <br>";
// }
// echo count($fruits); //returns the number of array elements

// foreach ($fruits as $fruit) {
//     echo $fruit . "<br>";
// }

// Associative arrays: array made of key=>value pairs

$capitals = array(
    "USA" => "Washington D.C",
    "Japan" => "Tokyo",
    "Nigeria" => "Abuja",
    "India" => "New Delhi"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $capital = $capitals[$_POST["country"]];

    echo "The Capital is $capital";
}


// $capitals["USA"] = "Las vegas"; //Update key-value pair
// $capitals["China"] = "Beijing"; //adds new key-value pair

// returns all keys in the array
// $keys = array_keys($capitals);

// foreach ($keys as $key) {
//     echo "$key <br>";
// }

// returns all values only
// $values = array_values($capitals);

// foreach ($values as $value) {
//     echo "$value <br>";
// }

// switch between values and keys
// $flipped_capitals = array_flip($capitals);

// foreach ($flipped_capitals as $flipped_capital) {
//     echo "$flipped_capital <br>";
// }

// Prints all array elements
// foreach ($capitals as $key => $value) {
//     echo "$key - $value <br>";
// }
