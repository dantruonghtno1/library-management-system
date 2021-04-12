<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <div class="reg_img">
            <br>
            <div class="box2">
                <h1 style="text-align: center; font-size: 35px;"> 
                    Libarary Management System
                </h1> 
                <h1 style="text-align: center; font-size: 25px;" >
                    User registration Form
                </h1> <br>

                <form name="registration" action="" method="post">
                                       <div class="login">
                        <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
                        <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                        <input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
                        <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""> <br>
                        <input class="btn  btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px; ">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php

if(isset($_POST['submit']))
{
  $count=0;
  $sql="SELECT username from `admin`";
  $res=mysqli_query($db,$sql);

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['username']==$_POST['username'])
    {
      $count=$count+1;
    }
  }
  if($count==0)
  {
    mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]');");
  ?>
    <script type="text/javascript">
     alert("Registration successful");
    </script>
  <?php
  }
  else
  {

    ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
    <?php

  }

}

?>

</body>