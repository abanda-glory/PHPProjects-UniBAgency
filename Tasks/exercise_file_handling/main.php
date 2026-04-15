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
