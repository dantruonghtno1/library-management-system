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
    <title>Fine Calculation</title>
    <style type="text/css">
        .srch {
            padding-left: 1000px;
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
    </style>
</head>
<body>
            <!-- sidenav bar -->
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
        
        <div class="h"><a href="books.php">T??? s??ch</a></div>
        <div class="h"><a href="request.php">??ang ch??? duy???t</a></div>
        <div class="h"><a href="issue_info.php">S??ch ??ang m?????n</a></div>
        <div class="h"><a href="expired.php">S??ch qu?? h???n</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; M??? r???ng</span>
    

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

    <div>
        <h1 style="text-align: center;">Ti???n ph?? b???n ???? tr???</h1><br>
    </div>

    <?php
        

            include "connection.php";
            $count = 0;
            $sql = "SELECT * FROM `fine` where username = '$_SESSION[login_user]'";
            $query = mysqli_query($db, $sql);
            
            $count = mysqli_num_rows($query);
    
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style = 'background-color: #6db6b9e6; '>";
    
                // echo "<th>";echo " User Name"; echo "</th>";
                echo "<th>"; echo " ID s??ch"; echo "</th>";
                echo "<th>"; echo " Ng??y tr???"; echo "</th>";
                echo "<th>"; echo " S??? ng??y qu?? h???n"; echo "</th>";
                echo "<th>"; echo " Ph??"; echo "</th>";
                // echo "<th>"; echo " Tr???ng th??i"; echo "</th>";
            echo "</tr>";
    
            while($row = mysqli_fetch_assoc(($query))) {
                echo "<tr>";
                    // echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['bid']; echo "</td>";
                    echo "<td>"; echo $row['returned']; echo "</td>";
                    echo "<td>"; echo $row['day']; echo "</td>";
                    echo "<td>"; echo $row['fine']; echo "</td>";
                    // echo "<td>"; echo $row['status']; echo "</td>";
    
                echo "</tr>";
    
            }
    
            echo "</table>";
    

    ?>
</body>
</html>