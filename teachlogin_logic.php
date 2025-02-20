<?php
require 'connection2.php';

// retrieve data from form
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$t_id = $_POST['t_id'];
$dob = $_POST['dob'];
$address = $_POST['address'];

//file upload
$profile_picture = "";
if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
    $target_dir = "uploads/"; 
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }

    $file_name = basename($_FILES["profile"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array("jpg", "jpeg", "png", "gif");

    // file type
    if (!in_array($file_type, $allowed_types)) {
        die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    // file size
    if ($_FILES["profile"]["size"] > 2 * 1024 * 1024) {
        die("Error: File size exceeds 2MB.");
    }

    // Move file to target folder
    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        $profile_picture = $target_file; 
    } else {
        die("Error: Failed to upload file.");
    }
}

// Insert data 
$sql = "INSERT INTO teachers (name, email, password, t_id, dob, address, profile_picture) 
        VALUES ('$name', '$email', '$password', '$t_id','$dob', '$address', '$profile_picture')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Signup successful!'); window.location.href='login.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>


