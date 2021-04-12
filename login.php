<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>STUDENT LOGIN</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

        .log_img {
            height: 700px;
            margin-top: 0PX;
            background-image: url("#");
            background-color: #e2ebf0;
            
        }
        section {
            margin-top: -20px;
        }

        .box1 {
            height: 450px;
            width: 410px;
            /* background-color: black; */
            margin: 30px auto;
            opacity: 0.85;
            color: white;
            padding: 10px;
            /* background: rgba(0, 0, 0, 0); */
            background-color: #000000;
            border-radius: 10px;
            margin-top: 60px;

        }

        label {
            font-size: 19px;
            font-weight: 600;
        }


        input {
            height: 25px;
            width: 300px;
            /* border-style:10px solid;
            border-color: red; */

        }
        form .login {
            margin:  auto 50px;
            
        }
        .form {
            border-bottom: 1px solid;
            border-style:10px solid;
            border-color: red;
            
        }
    </style>
</head>

<body>
    <section>
        <div class="log_img">
            <br><br><br>
            <div class="box1">
                <!-- <h1 style="text-align: center; font-size: 35px;">
                    Libarary Management System
                </h1> -->
                <h1 style="text-align: center; font-size: 25px;">
                    LOGIN
                </h1><br><br>

                <form name="login" action="" method="post">
                    <b>
                        <p style="padding-left: 50px; font-size:15px; font-weight:700;">Login as: </p>
                    </b>
                    
                    <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
                    <label for="admin">Admin</label>
                    
                    <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student">
                    <label for="student">Student</label>
                    <br><br>
                    <div style="padding-left: 40px; padding-right: 30px;">
                        <input class="form-control form" type="text" name="username" placeholder="Username" required=""><br>
                    </div>
                    <div style="padding-left: 40px; padding-right: 30px;">
                        <input class="form-control  form" type="password" name="password" placeholder="Password" required=""><br>
                    </div><br>
                    <div style="text-align: center; " >
                        <input class="btn  btn-default" type="submit" name="submit" value="Login" style="color: black; width: 100px; height: 30px;background-color:#0a5998; border-style:10px solid;
            border-color: #ffeb3b; ">
                    </div>
                    <br><br>
                    <p style="color: white; padding-left:30px ;">
                        <a style="color: red;" href="">&nbsp&nbsp&nbspForgot password</a>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbspRegistration &nbsp   <a style="color: red;" href="registration.php">Sign Up</a>
                    </p>
                </form>
            </div>


        </div>
        </div>
    </section>
    <?php
    if (isset($_POST['submit'])) {
        if ($_POST['user'] == 'admin') {
            $_SESSION['admin_or_student'] = 'admin';
            $count = 0;
            $sql =  "SELECT * FROM `admin` WHERE username = '$_POST[username]' and password = '$_POST[password]'";
            $query = mysqli_query($db, $sql);

            $count = mysqli_num_rows($query);
            if ($count == 0) {
    ?>
                <div class="alert alert-danger">
                    <strong>
                        the user name don't have
                    </strong>
                </div>
            <?php
            } else {
                $_SESSION['login_user'] = $_POST['username'];

            ?>
                <script type="text/javascript">
                    window.location = "admin/profile.php"
                </script>

            <?php
            }
        } else if ($_POST['user'] = 'student') {
            $_SESSION['admin_or_student'] = 'student';
            $count = 0;
            $sql =  "SELECT * FROM `student` WHERE username = '$_POST[username]' and password = '$_POST[password]'";
            $query = mysqli_query($db, $sql);

            $count = mysqli_num_rows($query);
            if ($count == 0) {
            ?>
                <div class="alert alert-danger">
                    <strong>
                        the user name don't have
                    </strong>
                </div>
            <?php
            } else {
                $_SESSION['login_user'] = $_POST['username'];
            ?>
                <script type="text/javascript">
                    window.location = "student/profile.php"
                </script>
    <?php
            }
        }
    }

    ?>

</body>

</html>