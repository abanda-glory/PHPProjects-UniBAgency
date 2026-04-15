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
