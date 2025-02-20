<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['t_id']))
{
    echo "<script>alert('Please Login'); window.location.href='login.php';</script>";
    exit();
}

//fetch details

$sql = "SELECT name, rollno FROM students ORDER BY rollno ASC";
$result = mysqli_query($conn, $sql);

// Handle Attendance Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rollno = $_POST['rollno'];
    $date = date('Y-m-d'); // Get today's date

    if (isset($_POST['mark_present'])) {
        $status = 'Present';
    } elseif (isset($_POST['mark_absent'])) {
        $status = 'Absent';
    } elseif (isset($_POST['mark_on_duty'])) {
        $status = 'On Duty';
    }

    // Insert attendance (or update if already exists)
    $query = "INSERT INTO attendance (rollno, date, status) 
              VALUES ('$rollno', '$date', '$status') 
              ON DUPLICATE KEY UPDATE status='$status'";
    mysqli_query($conn, $query);

    // Redirect to prevent duplicate form submission on refresh
    header("Location: teach_attend.php");
    exit();
}
?>


