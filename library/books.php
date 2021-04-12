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
    <title>Document</title>
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
        <div class="h"><a href="expired.php">Expired List</a></div>
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
    <!-- search bar -->
    <div class="srch">
        <form class="navbar-form" action="" method="POST" name="form1">
            
                <input class="form-control" type="text" name="search" placeholder = "search books" required="">
                <button style="background-color:#6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class = "glyphicon glyphicon-search"></span>
                </button> 
            
        </form>
    </div>
    <!-- rquest books -->
    <div class="srch">
        <form class="navbar-form" action="" method="POST" name="form1">
            
                <input class="form-control" type="text" name="bid" placeholder = "Enter book ID" required="">
                <button style="background-color:#6db6b9e6;" type="submit" name="submit1" class="btn btn-default">
                    Request
                </button> 
            
        </form>
    </div>


    <h2>Giá sách</h2>
    <?php
        if(isset($_POST['submit'])) {
            include "connection.php";
            $sql= "SELECT * FROM `books` where name like '%$_POST[search]%'";
            $q = mysqli_query($db, $sql);

            if(mysqli_num_rows($q) ==0) {
                echo "Không có sách này";
            }
            else {
                echo "<table class='table table-bordered table-hover' >";
                echo "<tr style = 'background-color: #6db6b9e6; '>";
        
                    echo "<th>";echo "ID"; echo "</th>";
                    echo "<th>"; echo "Books"; echo "</th>";
                    echo "<th>"; echo "Authors Name"; echo "</th>";
                    echo "<th>"; echo "Edition"; echo "</th>";
                    echo "<th>"; echo "Status"; echo "</th>";
                    echo "<th>"; echo "Quantity"; echo "</th>";
                    echo "<th>"; echo "Department"; echo "</th>";
                echo "</tr>";
        
                while($row = mysqli_fetch_assoc(($q))) {
                    echo "<tr>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                        echo "<td>"; echo $row['quantity']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
        
        
                    echo "</tr>";
        
                }
        
                echo "</table>";

            }
            

         }
         else {

            include "connection.php";
            $count = 0;
            $sql = "SELECT * FROM `books`";
            $query = mysqli_query($db, $sql);
            
            $count = mysqli_num_rows($query);
    
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style = 'background-color: #6db6b9e6; '>";
    
                echo "<th>";echo "ID"; echo "</th>";
                echo "<th>"; echo "Books"; echo "</th>";
                echo "<th>"; echo "Authors Name"; echo "</th>";
                echo "<th>"; echo "Edition"; echo "</th>";
                echo "<th>"; echo "Status"; echo "</th>";
                echo "<th>"; echo "Quantity"; echo "</th>";
                echo "<th>"; echo "Department"; echo "</th>";
            echo "</tr>";
    
            while($row = mysqli_fetch_assoc(($query))) {
                echo "<tr>";
                    echo "<td>"; echo $row['bid']; echo "</td>";
                    echo "<td>"; echo $row['name']; echo "</td>";
                    echo "<td>"; echo $row['authors']; echo "</td>";
                    echo "<td>"; echo $row['edition']; echo "</td>";
                    echo "<td>"; echo $row['status']; echo "</td>";
                    echo "<td>"; echo $row['quantity']; echo "</td>";
                    echo "<td>"; echo $row['department']; echo "</td>";
    
    
                echo "</tr>";
    
            }
    
            echo "</table>";
               

        }
        if(isset($_POST['submit1'])) {
            if(isset($_SESSION['login_user'])) {
                $sql = "INSERT INTO `issue_book` VALUES ('$_SESSION[login_user]','$_POST[bid]','','','')";
                mysqli_query($db, $sql);
                ?>
                    <script type="text/javascript">
                        window.location="request.php"
                    </script>
                <?php
            }
            else {
                ?>
                    <script type="text/javascript">
                        alert("Bạn chưa đăng nhập!");
                    </script>


                <?php
            }
        }

    ?>
</body>
</html>