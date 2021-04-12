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
  <title>STUDENT registration</title>
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

    .reg_img {
      height: 700px;
      margin-top: 0PX;
      background-image: url("#");
      background-color: #e2ebf0;
    }

  .box2 {
    height: 410px;
     width: 410px;
            /* background-color: black; */
    margin: 30px auto;
    opacity: 0.85;
    color: white;
    padding: 10px;
            /* background: rgba(0, 0, 0, 0); */
    background-color: #000000;
    border-radius: 20px;
    margin-top: 100px;

  }
  </style>
</head>

<body>
  <section>
    <div class="reg_img">
      <br>
      <div class="box2">
        <br>
        <h1 style="text-align: center; font-size: 35px;">
          Registration
        </h1><br>
        <h1 style="text-align: center; font-size: 25px;">
          <!-- User registration Form -->
        </h1> <br>

        <form name="registration" action="" method="post">
          <b>
            <p style="padding-left: 50px; font-size:15px; font-weight:700;">Registration as: </p>
          </b><br>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
          <label for="admin"> Admin</label>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student">
          <label for="student">Student</label><br><br><br>
          <div style="padding-left: 50px;">
          <input style="color: black; width: 100px; height: 30px;background-color:#0a5998; border-style:10px solid;
            border-color: #ffeb3b; " class="btn  btn-default" type="submit" name="submit" value="Sign Up" >

          </div>

        </form>
      </div>
    </div>
  </section>

  <?php

  if (isset($_POST['submit'])) {
    if ($_POST['id'] == 'admin') {
      ?>
        <script type="text/javascript">
          window.location = "./admin/registration.php"
        </script>
      <?php
    } 
    
    else {
      ?>
        <script type="text/javascript">
          window.location = "./student/registration.php"
        </script>
      <?php
    }
  }
  ?>

</body>