<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Student ERP</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .logo {
            width: 250px;
            height: 120px;
            padding-top: 20px;
            display: inline-block;
        }

        .img-logo {
            width: 100%;
            height: auto;
        }

        .container {
            width: 400px;
            height: auto;
            text-align: center;
            border: 1px solid black;
        }

        .signup-form {
            text-align: left;
            padding-inline: 15px;
        }

        .profile{
            margin-bottom: 25px;
        }

        .name,
        .email,
        .pwd,
        .t_id,  .course {
            width: 100%;
            border: none;
            border-bottom: 1px solid gray;
            margin-bottom: 25px;
        }

        .btn {
            padding: 20px;
            display: flex;
            justify-content: space-around;
        }

        button {
            border: none;
            background-color: white;
            font-size: 15px;
            border-radius: 20px;
        }

        button:hover {
            background-color: #D3D3D3;
            color: red;
        }
    </style>
</head>

<body>
    <div></div>
    <div class="container">
        <div class="logo">
            <img class="img-logo" src="img.png" alt="feebank">
        </div>
        <div class="signup-form">
            <h2 style="color: red;">Teacher Sign up</h2>
            <form method="POST" action="teachlogin_logic.php" enctype="multipart/form-data">
                <input class="name" type="text" name="name" placeholder="Name" required><br>
                <input class="email" type="email" name="email" placeholder="Email/Username" required><br>
                <input class="pwd" type="password" name="password" placeholder="Password" required><br>
                <input class="t_id" type="number" name="t_id" placeholder="Id" required><br>
                <label for="date">DOB:<input class="date" type="date" id="dob" name="dob" required></label><br>
                <label for="address">Address:</label><br>
                <textarea class="address" id="address" name="address" rows="4" cols="30" required></textarea><br><br>
                <label for="profile">Upload Profile picture:<input class="profile" type="file" name="profile" accept="image/png"></label><br>
                <label for="remember"></label><input type="checkbox" name="remember">Remember Me</label><br>
                <div class="btn">
                    <button>Back</button>
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>