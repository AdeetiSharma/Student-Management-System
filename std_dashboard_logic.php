<?php

require 'connection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please Login'); window.location.href='login.php';</script>";
    exit();
}

//  details
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, rollno, course, dob, address, profile_picture FROM students WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);
$rollno = $student['rollno'];

// Fetch marks 
$marks_query = "SELECT subject, marks FROM marks WHERE rollno = '$rollno'";
$marks_result = mysqli_query($conn, $marks_query);

$marks = [];
while ($row = mysqli_fetch_assoc($marks_result)) {
    $marks[$row['subject']] = $row['marks'];
}

// Fetch attendance data
$attendance_query = mysqli_query($conn, 
"SELECT COUNT(*) as total_days, 
SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) as present_days
FROM attendance WHERE rollno='$rollno'"
);
$attendance_data = mysqli_fetch_assoc($attendance_query);

$total_days = $attendance_data['total_days'] ?? 0;
$present_days = $attendance_data['present_days'] ?? 0;
$attendance_percentage = ($total_days > 0) ? round(($present_days / $total_days) * 100, 2) : 0;

?>