<?php
session_start();
require 'connection2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in database
    $sql = "SELECT * FROM teachers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $row['password'])) {  
            $_SESSION['t_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            echo "<script>alert('Login Successful!'); window.location.href='teach_attend.php';</script>";
        } else {
            echo "<script>alert('Incorrect Password!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not found!'); window.location.href='login.php';</script>";
    }
}
?>
