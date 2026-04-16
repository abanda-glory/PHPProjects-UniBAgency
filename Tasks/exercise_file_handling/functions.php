<?php
function saveLog($message)
{
    $filePath = DATA_FOLDER . "app.log";

    $timestamp = date("Y-m-d H:i:s");

    $logEntry = "[$timestamp] $message" . PHP_EOL;

    file_put_contents($filePath, $logEntry, FILE_APPEND | LOCK_EX);
}

function getAppInfo()
{
    return APP_NAME;
}

// Record visitor's data
function recordVisitor()
{
    $ip = $_SERVER['REMOTE_ADDR']; //Gets the user's IP address
    $time = date('Y-m-d H:i:s');
    $entry = '$time - IP: $ip' . PHP_EOL;

    //Append to visitors.txt
    file_put_contents(VISITOR_FILE, $entry, FILE_APPEND | LOCK_EX);
}

//Count visitors
function visitorCount()
{
    if (!file_exists(VISITOR_FILE)) {
        return 0;
    } else {
        $lines = file(VISITOR_FILE); //file() reads the visitor_file into an array line by line
        return count($lines);
    }
}
