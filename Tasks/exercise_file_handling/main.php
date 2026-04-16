<?php
// STEP 1: Import the other files.
// include: If config is missing, show a warning but keep going.
// require: If functions are missing, STOP immediately (the app can't run).
include __DIR__ . '/config.php';
require __DIR__ . '/functions.php';

// STEP 2: Use our functions.
// We call getAppInfo() and store the result in $appName
$appName = getAppInfo();
echo "--- " . $appName . " ---" . PHP_EOL;

// STEP 3: Perform the file handling task.
$statusMessage = "Application started successfully";
saveLog($statusMessage);

// STEP 4: Feedback for the user
echo "Action: " . $statusMessage . PHP_EOL;
echo "Check your '" . DATA_FOLDER . "' folder for the log file!" . PHP_EOL;

//Record the current visit
recordVisitor();

//Display the count
echo "<h1>Total Visitors: " . visitorCount() . "</h1>";

//Reading file using file_get_content()
//file_get_content reads the whole file into one single string
echo "<h3>Method A: file_get_content(RAW String)</h3>";
$contentString = file_get_contents(VISITOR_FILE);
echo "<pre>" . $contentString . "</pre>";

echo "<hr>";

//Reading file using file()
//file() reads the file into an array where each line is an item.
echo "<h3>Method B: file() (Array Processing)</h3>";
$contentArray = file(VISITOR_FILE);

echo "<pre>";
print_r($contentArray);
echo "</pre>";
