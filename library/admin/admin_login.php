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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    section {
        margin-top: -20px;
    }
</style>
</head>
<body>
    <section>
        <div class="log_img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align: center; font-size: 35px;"> 
                    Libarary Management System
                </h1> 
                <h1 style="text-align: center; font-size: 25px;" >
                    User Login Form
                </h1>

                <form name="login" action="" method="post">
                    <div class="login">
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                        <input class="btn  btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px; ">
                    </div>
                
                    <br><br>
                    <p style="color: white; padding-left:30px ;">
                        <a style="color: white;" href="">Forgot password</a> 
                        &nbsp &nbsp &nbsp &nbsp &nbsp
                        New to this website <a style="color: white;" href="registration.html">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
    <?php
        if(isset($_POST['submit'])) 
        {
            $count = 0;
            $sql =  "SELECT * FROM `admin` WHERE username = '$_POST[username]' and password = '$_POST[password]'";
            $query = mysqli_query($db, $sql);
            
            $count = mysqli_num_rows($query);
            if($count == 0){
                ?>
                    <!-- <script type="text/javascript">
                        alert("the user name don't have");
                    </script> -->
                    <div class="alert alert-danger">
                        <strong>
                            the user name don't have
                        </strong>
                    </div>
                <?php
            }
            else {
                $_SESSION['login_user'] = $_POST['username'];

                ?>
                    <script type="text/javascript">
                        window.location= "index.php"
                    </script>

                <?php
            }
        }

    ?>

    <footer>

    </footer>
</body>
</html>