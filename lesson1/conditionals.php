<?php
$age = 21;

if ($age <= 0) {
    echo "Invalid age.";
} elseif ($age >= 18) {
    echo "You may enter this site.";
} elseif ($age >= 100) {
    echo "You are too old to enter this site.";
} else {
    echo "Sorry, you are not old enough to enter this site.";
}


$hours_worked = 50;
$rate_per_hour = 15;
$weekly_pay = null;

if ($hours_worked < 0) {
    echo "Invalid hours worked.";
} elseif ($hours_worked == 0) {
    $weekly_pay = 0;
} elseif ($hours_worked <= 40) {
    $weekly_pay = $hours_worked * $rate_per_hour;
} else {
    $overtime_hours = $hours_worked - 40;
    $overtime_pay = $overtime_hours * ($rate_per_hour * 1.5);
    $weekly_pay = (40 * $rate_per_hour) + $overtime_pay;
}

echo "You worked $hours_worked hours this week. Your weekly pay is \$ $weekly_pay.";

// Logical operators:combine conditional statements
// && (AND) True if both conditions are true
$temp = 100;
if ($temp > 0 && $temp < 30) {
    echo "The weather is good.";
} else {
    echo "The weather is bad.";
}
// || (OR) True if at least one condition is true
$day = "Saturday";
if ($day == "Saturday" || $day == "Sunday") {
    echo "It's the weekend!";
} else {
    echo "It's a weekday.";
}
// ! (NOT) True if the condition is false
$is_raining = false;
if (!$is_raining) {
    echo "It's not raining.";
} else {
    echo "It's raining.";
}

$grade = "A";
if ($grade == "A") {
    echo "Excellent!";
} elseif ($grade == "B") {
    echo "Good job!";
} elseif ($grade == "C") {
    echo "You can do better.";
} elseif ($grade == "D") {
    echo "You need to work harder.";
} elseif ($grade == "F") {
    echo "You failed.";
} else {
    echo "Invalid grade.";
}

// Using switch statement
$grade = "A";

switch ($grade) {
    case "A":
        echo "Excellent!";
        break;
    case "B":
        echo "Good job!";
        break;
    case "C":
        echo "You can do better.";
        break;
    case "D":
        echo "You need to work harder.";
        break;
    case "F":
        echo "You failed.";
        break;
    default:
        echo "Invalid grade.";
}
