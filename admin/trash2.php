<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Request</title>
    <style type="text/css">
        .srch {
            padding-left: 850px;

        }
        .form-control {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
            /* margin-right: 300px; */
        }
        .btn-default {
            margin-right: 300px;
        }
        body {
        font-family: "Lato", sans-serif;
        }

        .sidenav {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        #main {
        transition: margin-left .5s;
        padding: 16px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        .h:hover {
            color: white;
            width: 300px;
            height: 50px;
            background-color: red;
        }
        .container {
            height: 700px;
            background-color: black;
            color: white;
            opacity: 0.8;
            text-align: center;
        }
        .Approve {
            margin-left: 420px;
        }
    </style>
</head>
<body>
    <!-- side bar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div style="color: white;margin-left:30px; font-size:25px;">
            <?php
                if(isset($_SESSION['login_user'])) {
                    echo "Welcome ".$_SESSION['login_user']; 
                    echo "</br></br>";
                   
                }
           ?>
        </div> 
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        }
    </script>
    <div class="container">
    <br>
        <h3 style="text-align:center"> Approve Request</h3>

        <form class="Approve" action="Approve"  action="" method="post"><br><br>
            <input type="text" class="form-control" name = "approve" placeholder="Yes or No" require=""> <br>
            <input type="text" class="form-control" name = "issue" placeholder="Issue Date yyyy-mm-dd" require=""> <br>
            <input type="text" class="form-control" name = "return" placeholder="Return Date yyyy-mm-dd" require=""> <br><br>
            <button class="btn btn-default" type="submit" name="submit1" style="margin-right: 400px;">Approve</button>


        </form>
    </div>
</div>


</body>
</html>