<?php

require 'teach_attend_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .nav {
            width: 20%;
        }

        .main-container {
            display: flex;
        }

        .right-dash {
            width: 80%;
            /* margin: auto; */
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2)
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

        .mark-attendance {
            background-color: #007bff;
            color: white;
        }

        .select-date {
            background-color: #28a745;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        .action-buttons button {
            margin: 2px;
            padding: 8px;
            font-size: 12px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .present {
            background-color: #28a745;
        }

        .absent {
            background-color: #dc3545;
        }

        .on-duty {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="nav">
            <?php include('navbar2.php') ?>
        </div>
        <div class="right-dash">
            <div class="top">
                <button class="mark-attendance">Mark Attendance</button>
                <button class="select-date">Select Date</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sno = 1;
                    while ($row = mysqli_fetch_assoc(($result))) {

                        echo "<td>$sno</td>";
                        echo "<td>{$row['rollno']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td class='action-buttons'>
                        <form method='post' action='teach_attend_logic.php'>
                                <input type='hidden' name='rollno' value='{$row['rollno']}'>
                                <button type='submit' name='mark_present' class='present'>Present</button>
                                <button type='submit' name='mark_absent' class='absent'>Absent</button>
                                <button type='submit' name='mark_on_duty' class='on-duty'>On Duty</button>
                        </form>
                        </td>";
                        echo "</tr>";
                        $sno++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

</body>

</html>