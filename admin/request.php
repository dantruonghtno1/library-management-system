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
        <div class="h"><a href="books.php">Tủ sách</a></div>
        <div class="h"><a href="request.php">Sách yêu cầu</a></div>
        <div class="h"><a href="issue_info.php">Sách đã mượn</a></div>
        <div class="h"><a href="expired.php">Sách quá hạn</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Mở rộng</span>
    

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
        <div class = "srch">
            <form action=""  method="post">
            <br>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""> <br>
                <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
                <button class="btn btn-default" name="submit" type="submit">Submit</button>

            </form>
        </div>
    <h3>Sách chờ phê duyệt</h3>
    <?php 
        if(isset($_SESSION['login_user'])) {
            $sql = "SELECT student.username, roll,books.bid,name, authors, edition, status FROM student INNER JOIN issue_book ON student.username = issue_book.username INNER JOIN books ON issue_book.bid = books.bid WHERE issue_book.approve = ''";

            $res = mysqli_query($db, $sql);
            if(mysqli_num_rows($res) ==0) {
                echo "<h2><b>";
                echo "Không có sách được yêu cầu.";
                echo "</h2></b>";
            }
            else 
            {
                echo "<table class='table table-bordered table-hover' >";
                echo "<tr style = 'background-color: #6db6b9e6; '>";
        
                    echo "<th>"; echo "Student username"; echo "</th>";
                    echo "<th>"; echo "Student ID"; echo "</th>";
                    echo "<th>"; echo "Bid"; echo "</th>";
                    echo "<th>"; echo "Tên sách"; echo "</th>";
                    echo "<th>"; echo "Tên tác giả"; echo "</th>";
                    echo "<th>"; echo "Phiên bản"; echo "</th>";
                    echo "<th>"; echo "Trạng thái"; echo "</th>";
                echo "</tr>";
        
                while($row = mysqli_fetch_assoc(($res))) {
                    echo "<tr>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['roll']; echo "</td>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";

                    echo "</tr>";
        
                }
        
                echo "</table>";                
            }
        }
        else 
        {
            ?>  
            <br>
                <h4  style="color: yellow;">Bạn cần phải đăng nhập trước!</h4>
            <?php
        }
        if(isset($_POST['submit'])) {
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['bid'] = $_POST['bid'];

            ?>
                <script type = "text/javascript">
                    window.location = "approve.php";
                </script>

            <?php
            
        }
    ?>


    </div>
</body>