<?php
// Initialize variables to track status
$success = false;
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allowed_image_ext = ['jpg', 'jpeg', 'png'];
    $allowed_doc_ext = ['pdf'];

    // Get extensions
    $uploaded_profile_pic_ext = strtolower(pathinfo($_FILES['profile-pic']['name'], PATHINFO_EXTENSION));
    $uploaded_doc_ext = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));

    // Validate Extensions
    if (!in_array($uploaded_profile_pic_ext, $allowed_image_ext)) {
        $error_message = "Error: Profile picture must be a JPG, JPEG, or PNG.";
    } elseif (!in_array($uploaded_doc_ext, $allowed_doc_ext)) {
        $error_message = "Error: Document must be a PDF.";
    } else {

        // Setup Directory
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Generate Unique Names
        $timestamp = date('Ymd');
        $first_name = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['username']);

        $new_profile_name = "profile_" . $timestamp . "_" . $first_name . "." . $uploaded_profile_pic_ext;
        $new_doc_name = "doc_" . $timestamp . "_" . $first_name . "." . $uploaded_doc_ext;

        $profile_target = $upload_dir . $new_profile_name;
        $doc_target = $upload_dir . $new_doc_name;

        // Move Files
        if (
            move_uploaded_file($_FILES['profile-pic']['tmp_name'], $profile_target) &&
            move_uploaded_file($_FILES['document']['tmp_name'], $doc_target)
        ) {

            // JSON Logging
            $log_file = 'uploads/log.json';
            $current_data = [];

            if (file_exists($log_file)) {
                $json_content = file_get_contents($log_file);
                $current_data = json_decode($json_content, true) ?? [];
            }

            $current_data[] = [
                "user" => htmlspecialchars($_POST['username']),
                "profile_pic" => $new_profile_name,
                "document" => $new_doc_name,
                "upload_time" => date('Y-m-d H:i:s')
            ];

            file_put_contents($log_file, json_encode($current_data, JSON_PRETTY_PRINT));

            // Mark as success to hide the form
            $success = true;
        } else {
            $error_message = "Error: Failed to move uploaded files.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            padding: 20px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php if ($success): ?>
        <h2>Upload Successful!</h2>
        <p>Welcome, <?php echo htmlspecialchars($_POST['username']); ?>!</p>

        <h3>Your Profile Picture</h3>
        <p><img src='<?php echo $profile_target; ?>' style='width:200px; border-radius:10px;' alt="Profile Pic"></p>

        <h3>Your Document</h3>
        <p><a href="<?php echo $doc_target; ?>" target="_blank">View Document</a></p>

        <hr>
        <p><a href="upload.php">Upload another file</a></p>

    <?php else: ?>
        <h2>Register & Upload</h2>

        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="upload.php" enctype="multipart/form-data" method="post">
            <label for="name">Enter Your Name: </label>
            <input type="text" name="username" id="name" required placeholder="Enter your name...">

            <label for="profile-pic">Upload a Profile Picture: </label>
            <input type="file" name="profile-pic" id="profile-pic" accept=".jpg,.jpeg,.png" required>

            <label for="doc">Upload a Document:</label>
            <input type="file" name="document" id="doc" accept=".pdf" required>

            <br><br>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>

</body>

</html>