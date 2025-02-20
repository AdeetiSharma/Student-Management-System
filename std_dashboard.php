<?php
session_start();

require 'std_dashboard_logic.php';
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
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            /* gap: 40px; */
        }

        .photo-card,
        .marks-section,
        .details-card,
        .attendance-card {
            margin-left: 70px;
            background: white;
            padding-block: 0px 15px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            height: 250px;
            width: 250px;
        }

        .photo-card p {
            margin-top: 20px;
            font-weight: 700;
        }

        .details-card p{
            margin-left: 5px;
        }

        .top,
        .bottom {
            display: flex;
            gap: 40px;
        }

        .user-img {
            margin-top: 15px;
            width: 100%;
            height: auto;

        }

        .image{
            /* border-radius: 50%; */
            object-fit: cover;
        }

        .detail-info {
            text-align: left;
            width: 100%;
        }

        .detail-info h3 {
            text-align: center;
        }

        .detail-info p {
            margin-block: 15px;
        }

        .marks-section {
            width: 50%;
        }

        .mark-card {
            margin-block: 20px;
            display: flex;
            justify-content: space-between;
        }

        .marks-section h3 {
            text-align: left;
        }

        .head{
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            background: #ffcc66;
            border-radius: 10px 10px 0 0;
        }


    </style>
</head>

<body>
    <div class="main-container">
        <div class="nav">
            <?php include('navbar.php') ?>
        </div>
        <div class="right-dash">
            <div class="top">
                <div class="photo-card">
                    <div class="head">Student Photo</div>
                    <div class="user-img">
                        <img class="image" src="<?php echo !empty($student['profile_picture']) ? $student['profile_picture'] : 'default.png' ?>" alt="" width="100px">
                    </div>
                    <p><?php echo $student['name'] ?></p>
                </div>
                <div class="details-card">
                    <div class="detail-info">
                        <div class="head" style="background: #add8e6;">Student Details</div>
                        <p><strong>Address:</strong> <?php echo $student['address']; ?></p>
                        <p><strong>DOB:</strong> <?php echo $student['dob']; ?></p>
                        <p><strong>Course:</strong> <?php echo $student['course']; ?></p>
                    </div>
                </div>
                <div class="attendance-card" >
                    <div class="head" style="background: #f8c6c6;">Overall Attendance</div>
                    <div class="progress-bar"><?php echo $attendance_percentage; ?>%</div>
                </div>
            </div>
            <div class="bottom">
                <div class="marks-section">
                    <div class="head" style="background: #DCFFE7;">Marks Section</div>
                    <div class="marks-container">
                        <?php
                        if (!empty($marks)) {
                            foreach ($marks as $subject => $mark) {
                                echo "<div class='mark-card'>";
                                echo "<h3>$subject</h3>";
                                echo "<p>$mark</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No marks available</p>";
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>