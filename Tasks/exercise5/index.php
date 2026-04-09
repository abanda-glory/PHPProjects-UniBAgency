<?php

$fruits = array("Apple", "Orange", "Kiwi", "Mango", "Berry");

// Adds fruit to the end
array_push($fruits, "Pineapple");

// Removes first fruit
array_shift($fruits);

// Prints the array
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

// Associative array
$student_info = array(
    "name" => "John Doe",
    "age" => 18,
    "grade" => "A"
);

$stud_name = $student_info["name"];
$stud_grade = $student_info["grade"];

echo "Name: $stud_name <br> Grade: $stud_grade <br>";

$arr = [1, 2, 3, 4, 5];

$even_numbers = array_filter($arr, function ($num) {
    return $num % 2 == 0;
});

// print_r($even_numbers);
echo "<pre>";
print_r($even_numbers);
echo "</pre>";


$squared_numbers = array_map(function ($num) {
    return $num * $num;
}, $arr);

echo "<pre>";
print_r($squared_numbers);
echo "</pre>";
