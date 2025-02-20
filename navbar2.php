<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }


        .header {
            background-color: rgb(47, 49, 66);
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo img {
            width: 80px;
            height: 50px;
            border-radius: 10px;
            margin: 5px;
        }

        .content p {
            font-size: 12px;
        }

        .content button {
            font-size: 12px;
            border: none;
            color: rgb(22, 144, 166);
            background-color: rgb(47, 49, 66);
            border-radius: 20px;
            margin-top: 10px;
        }

        .sidebar {
            width: 100%;
            /* padding-left: 20px; */
            background-color: #0c0e1f;
            color: white;
            height: 100vh;
        }

        .menu {
            list-style: none;

        }

        .menu li {
            padding: 20px 20px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        a{
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="sidebar">

        <!-- header section -->
        <div class="header">
            <div class="logo">
                <img src="img.png" alt="">
            </div>
            <div class="content">
                <p>PCTE GROUP OF INSTITUTES</p>
                <button onclick="location.href='logout.php'">Logout</button>
            </div>
        </div>

        <!-- menu section -->
        <ul class="menu">
            <a href="./teach_attend.php"><li><i class="fi fi-br-game-board-alt"></i><span>Dashboard</span></li></a>
            <a href="./subject.php"><li><i class="fi fi-tr-books"></i><span>Subject Marks</span></li></a>
            <li><i class="fi fi-tr-dashboard-monitor"></i><span>Lectures</span></li>
            <li><i class="fi fi-rr-clock"></i> <span>Time Table</span></li></a>
        </ul>

    </div>

</body>

</html>