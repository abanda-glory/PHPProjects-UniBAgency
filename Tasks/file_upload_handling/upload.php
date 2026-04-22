<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allowed_image_ext = ['jpg', 'jpeg', 'png'];
    $allowed_doc_ext = ['pdf'];

    // Get uploaded profile picture extension
    $uploaded_profile_pic_name = $_FILES['profile-pic']['name'];
    $uploaded_profile_pic_ext = strtolower(pathinfo($uploaded_profile_pic_name, PATHINFO_EXTENSION));

    // Get uploaded document extension
    $uploaded_doc_name = $_FILES['document']['name'];
    $uploaded_doc_ext = strtolower(pathinfo($uploaded_doc_name, PATHINFO_EXTENSION));

    // Validate Image
    if (!in_array($uploaded_profile_pic_ext, $allowed_image_ext)) {
        echo "Error: Profile picture must be a JPG, JPEG, PNG. You uploaded a .$uploaded_profile_pic_ext file.<br>";
    } else {
        echo "Success: Profile picture extension is valid.<br>";
    }

    // Validate document
    if (!in_array($uploaded_doc_ext, $allowed_doc_ext)) {
        echo "Error: Document must be PDF. You uploaded a .$uploaded_doc_ext file.<br>";
    } else {
        echo "Success: Document extension is valid.<br>";
    }

    // folder name 
    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        if (mkdir($upload_dir, 0777, true)) {
            echo "Success: Directory '$upload_dir' created.<br>";
        } else {
            die("Error: Failed to create directory '$upload_dir'. Check your folder permissions.");
        }
    }

    $timestamp = date('Ymd');
    $first_name = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['username']);
    $new_profile_name = "profile_" . $timestamp . "_" . $first_name . "." . $uploaded_profile_pic_ext;
    $new_doc_name = "doc_" . "_" . $timestamp . $first_name . "." . $uploaded_doc_ext;

    $profile_target = $upload_dir . $new_profile_name;
    $doc_target = $upload_dir . $new_doc_name;


    $new_entry = [
        "user" => htmlspecialchars($_POST['username']),
        "profile_pic" => $new_profile_name,
        "document" => $new_doc_name,
        "upload_time" => date('Y-m-d H:i:s')
    ];

    $log_file = 'uploads/log.json';
    $current_data = [];

    if (file_exists($log_file)) {
        $json_content = file_get_contents($log_file);
        $current_data = json_decode($json_content, true);
    }

    $current_data = $new_entry;

    $final_json = json_encode($current_data, JSON_PRETTY_PRINT);
    file_put_contents($log_file, $final_json);


    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>

<body>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <label for="name">Enter Your Name: </label>
        <input type="text" name="username" id="name" required placeholder="Enter your name...">
        <label for="profile-pic">Upload a Profile Picture: </label>
        <input type="file" name="profile-pic" id="profile-pic" accept=".jpg,.jpeg,.png" required>
        <label for="doc">Upload a Document:</label>
        <input type="file" name="document" id="doc" accept=".pdf" required>

        <button type="submit">Submit</button>
    </form>
</body>

</html>