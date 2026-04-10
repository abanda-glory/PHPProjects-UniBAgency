<?php

$student_info = [
    "stud_1001" => [
        'name' => 'Bobga Alice',
        'id' => 1001,
        'grades' => [12, 30, 20, 10, 15]
    ],
    "stud_1002" => [
        'name' => 'John Paul',
        'id' => 1002,
        'grades' => [15, 14, 20, 30, 25]
    ],
    "stud_1003" => [
        'name' => 'Takum Mary',
        'id' => 1003,
        'grades' => [26, 20, 15, 30, 25]
    ],
    "stud_1004" => [
        'name' => 'Ngwa Jossey',
        'id' => 1004,
        'grades' => [22, 20, 21, 29, 10]
    ],
];

// Add student
function register(&$student_info, $name, $id)
{
    $student_info["stud_$id"] = [
        'name' => $name,
        'id' => $id,
        'grades' => []
    ];
}

// Add student grade by ID
function add_grade(&$student_info, $id, $score)
{
    $key = "stud_" . $id;

    if (isset($student_info[$key])) {
        if (is_array($score)) {
            array_push($student_info[$key]['grades'], ...$score);
            return "Success";
        } else {
            array_push($student_info[$key]['grades'], $score);
            return "Success";
        }
    } else {
        return "Error: Student ID $id not found!";
    }
}

// Calculate average grade for a student by ID
function calc_average(&$student_info, $id)
{
    $key = "stud_" . $id;

    if (isset($student_info[$key])) {
        $scores = $student_info[$key]['grades'];
        $total_score = count($scores);

        if ($total_score > 0) {
            $sum = 0;
            foreach ($scores as $score) {
                $sum += $score;
            }

            return $sum / $total_score;
        } else {
            return 0;
        }
    } else {
        return "Error: Student ID $id was not found!";
    }
}


// List all students with their averages
function list_averages($student_info)
{
    $report = [];

    foreach ($student_info as $student) {
        $average = calc_average($student_info, $student['id']);

        // Store the name and average together in the container
        $report[] = [
            'name' => $student['name'],
            'average' => $average
        ];
    }

    return $report;
}


// 2. Register Students
register($student_info, "Fru George", 1005);
register($student_info, "Tikum Praises", 1006);
register($student_info, "Lum Theresa", 1007);

// 3. Add Grades (Single and Bulk)
add_grade($student_info, 1005, [12, 15, 18]);
add_grade($student_info, 1006, 20);
add_grade($student_info, 1007, [14, 16]);

// 4. Perform specific lookups
$alice_avg = calc_average($student_info, 1001);
echo "Alice's Average is " . $alice_avg . "<br>";

echo "<hr>";

// 5. Generate the Final Report
$final_report = list_averages($student_info);

print_r($final_report);
