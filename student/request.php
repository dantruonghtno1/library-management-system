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
        <div class="h"><a href="books.php">Giá sách</a></div>
        <div class="h"><a href="request.php">Đang chờ duyệt</a></div>
        <div class="h"><a href="issue_info.php">Sách đang mượn </a></div>
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
    <div>
        <h1 style="text-align: center;"><b>Sách đang gửi yêu cầu mượn.</b></h1><br>
    </div>
    <?php
                if(isset($_SESSION['login_user'])) {
                    include "connection.php";
                    $sql= "SELECT * FROM `issue_book` where username ='$_SESSION[login_user]' and approve = ''";
                    $q = mysqli_query($db, $sql);
                    if(mysqli_num_rows($q) ==0) {
                        echo "<br><br><br><h1><b>Bạn chưa yêu cầu mượn cuốn nào</b></h1>";
                    }
                    else {
                        echo "<table class='table table-bordered table-hover' style='text-align: center;' >";
                        echo "<tr style = 'background-color: #6db6b9e6; style='text-align: center;'>";
                
                            echo "<th>"; echo "<div style='text-align: center;'>ID Sách</div>"; echo "</th>";
                            echo "<th>"; echo "<div style='text-align: center;'>Trạng Thái</div>"; echo "</th>";
                            echo "<th>"; echo "<div style='text-align: center;'>Ngày yêu cầu</div>"; echo "</th>";
                            echo "<th>"; echo "<div style='text-align: center;'>Ngày trả</div>"; echo "</th>";
                        echo "</tr>";
                
                        while($row = mysqli_fetch_assoc(($q))) {
                            echo "<tr>";
                                echo "<td>"; echo $row['bid']; echo "</td>";
                                // echo "<td>"; echo $row['approve']; echo "</td>";
                                echo "<td>"; echo "<div style='text-align: center;'><b>Đang chờ phê duyệt!</b><div>"; echo "</td>";
                                echo "<td>"; echo "--/--/----"; echo "</td>";
                                echo "<td>"; echo "--/--/----"; echo "</td>";
                            echo "</tr>";
                
                        }
                
                        echo "</table>";
        
                    }
                }else {
                    echo "<br><br><br><br>";
                    echo "<h2><b>Please login first!</b></h2>";
                }

    ?>
</body>