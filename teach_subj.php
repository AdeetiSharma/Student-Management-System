<?php
require 'connection.php';

// Get Student Roll No from URL
$rollno = $_GET['rollno'];

// Fetch Student Details
$student_query = mysqli_query($conn, "SELECT name FROM students WHERE rollno='$rollno'");
$student = mysqli_fetch_assoc($student_query);

// Fetch Student Marks
$marks_query = mysqli_query($conn, "SELECT * FROM marks WHERE rollno='$rollno'");
$marks = [];
while ($row = mysqli_fetch_assoc($marks_query)) {
    $marks[$row['subject']] = $row['marks'];
}

// Subjects
$subjects = ['Physics', 'Chemistry', 'Maths', 'English'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = $_POST['subject'] ?? '';

    if (isset($_POST['add'])) {
        $new_marks = $_POST['new_marks'] ?? 0;
        mysqli_query($conn, "INSERT INTO marks (rollno, subject, marks) VALUES ('$rollno', '$subject', '$new_marks')");
    }

    elseif (isset($_POST['edit'])) {
        $new_marks = $_POST['new_marks'] ?? 0;
        mysqli_query($conn, "UPDATE marks SET marks='$new_marks' WHERE rollno='$rollno' AND subject='$subject'");
    }

    elseif (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM marks WHERE rollno='$rollno' AND subject='$subject'");
    }

    elseif (isset($_POST['delete_student'])) {
        mysqli_query($conn, "DELETE FROM attendance WHERE rollno='$rollno'");
        mysqli_query($conn, "DELETE FROM marks WHERE rollno='$rollno'");
        mysqli_query($conn, "DELETE FROM students WHERE rollno='$rollno'");
        echo "<script>alert('Student Deleted!'); window.location.href='teach_attend.php';</script>";
        exit();
    }

    header("Location: teach_subj.php?rollno=$rollno");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>
    <style>
        .nav {
            width: 20%;
        }

        .main-container {
            display: flex;
        }

        .right-dash {
            width: 80%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-subject {
            background-color: #007bff;
            color: white;
        }

        .edit-marks {
            background-color: #28a745;
            color: white;
        }

        .delete-subject {
            background-color: #dc3545;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        .delete-student {
            background-color: red;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="nav">
            <?php include('navbar2.php') ?>
        </div>
        <div class="right-dash">
            <h2>Marks for <?php echo $student['name']; ?> (Roll No: <?php echo $rollno; ?>)</h2>

            <table>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($subjects as $subject): ?>
                <tr>
                    <td><?php echo $subject; ?></td>
                    <td><?php echo isset($marks[$subject]) ? $marks[$subject] : 'Not Added'; ?></td>
                    <td class="actions">
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                            <input type="number" name="new_marks" placeholder="Enter Marks" required>
                            <button type="submit" name="add" class="add-subject">Add</button>
                        </form>

                        <form method="post" style="display:inline;">
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                            <input type="number" name="new_marks" placeholder="Enter New Marks" required>
                            <button type="submit" name="edit" class="edit-marks">Edit</button>
                        </form>

                        <form method="post" style="display:inline;">
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                            <button type="submit" name="delete" class="delete-subject">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <form method="post">
                <button type="submit" name="delete_student" class="delete-student">Delete Student</button>
            </form>
        </div>
    </div>
</body>

</html>
