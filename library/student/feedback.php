<?php
    include "connection.php";
    include "navbar.php";

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback</title>
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
    <style type="text/css">
        body {
            background-image: url("./images/66.jpg");
        }

        .wrapper {
            padding: 10px;
            margin:-20px auto;
            width: 900px;
            height: 600px;
            background-color: black;
            opacity: 0.8;
            color: white;

        }
        .form-control {
            height: 70px;
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h4>If you have any suggestions or quessions please comment below:</h4>

        <form action=""  method="post">
            <input class="form-control" type="text" name="comment" placeholder="Write something...">
            <br>
            <input class="btn btn-default" type="submit" name= "submit" value = "comment" style="width:100px; height: 35px">
        </form>
    </div>

    <div>
        <?php
            if (isset($_POST['submit'])) {
                $sql = "INSERT INTO `comments`(`comment`) VALUES ('$_POST[comment]')";
                mysqli_query($db, $sql);
            }
        ?>

    </div>
</body>
</html>