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
        .book {
            width: 400px;
            margin: 0 auto;

        }
        .form-control {
            background-color: #e8e4e4;
            border-color: #8e0d2d;
        }
        .button_{
            color: #333;
            background-color: #337ab7;
            border-color: #de0747;
            width: 100px;
            height: 35px;
        }
        .button_:hover{
            color: #333;
            background-color: #337ab7;
            border-color: #de0747;
            width: 100px;
            height: 35px;
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
        <div class="h"><a href="add.php">Thêm sách</a></div>
        <!-- <div class="h"><a href="delete.php">Xóa sách</a></div> -->
        <div class="h"><a href="request.php">Sách yêu cầu</a></div>
        <div class="h"><a href="issue_info.php">Sách đã mượn</a></div>
        <div class="h"><a href="expired.php">Sách quá hạn</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Mở rộng</span>
        <div class="container"  style="text-align: center;">
            <h2 style="color: black; text-align:center;">
                Thêm sách mới.
            </h2>
            <form action="" method="POST" class="book">
                <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
                <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
                <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
                <input type="text" name="edition" class="form-control" placeholder="Edition " required=""><br>
                <input type="text" name="status" class="form-control" placeholder="Status " required=""><br>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
                <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
                <input type="text" name="imgbook" class="form-control" placeholder="Image" required=""><br><br>
                <button class="btn btn-default button_" type="submit" name="submit">ADD</button>
            </form>
        </div>
        <?php
            if(isset($_POST['submit'] )){
                if(isset($_SESSION['login_user'])){
                    $sql = "INSERT INTO `books`VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]', '$_POST[imgbook]')";
                    mysqli_query($db, $sql);
                    ?>
                        <script type="text/javascript">
                            alert("Thêm sách thành công");
                        </script>
                    <?php
                }
                else {
                    ?>
                        <script type="text/javascript">
                            alert("Bạn chưa đăng nhập.")
                        </script>
                    <?php
                }

            }

        ?>

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

    </div>
</body>
</html>