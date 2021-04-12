<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Libary Management System</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        nav {
            line-height: 0px;
            word-spacing: auto;
            /* padding: 20px ;
            padding-top: -20px; */
            padding-left: 20px;
            padding-top:15px;
            padding-right: 50px;
        }

        nav li {
            display: inline-block;
            line-height: 80px;
            font-size: 21px;
            
        }
        nav li:hover {
            opacity: 0.5;
        }

        .imglogo {
            width:130px; /* you can use % */
            height: auto;
            border-radius: 50%;
        }
        .name {
            float: left;
            line-height: 80px;
            padding-left: 50px;
            font-size: 40px;
            word-spacing: 15px;
            font-family: "Times New Roman", Times, serif;
            padding-top:5px;
        }

        .box {
            height: 300px;
            width: 600px;
            background-color: #3f51b5;
            margin: 70px auto;
            opacity: 0.6;
            color: white;

        }

        .sec_img{
            background: url("./images/vnu_2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 542px;
    
        }
    </style>
</head>

<style type="text/css">

</style>
<body>
    <div class="wrapper">

    
        <header>
            <div class="logo">
                <img class="imglogo" src="./images/uetlogo (1).png" alt="">
                <!-- <h1 style="color:white">UET LIC</h1> -->
            </div>

            <div >
                
                <nav>
                    <ul>
                        <h1 class = "name" style="color:white; float:left;">UET LIBRARY</h1>
                    </ul>
               </nav>
            </div>
            
            <?php
                if(isset($_SESSION['login_user'])){
                    ?>
                        <nav style="float: right;">
                            <ul>
                                <li><a href="index.php">TRANG CHỦ&nbsp&nbsp&nbsp&nbsp</a></li>
                                <li><a href="books.php">TỦ SÁCH&nbsp&nbsp&nbsp&nbsp</a></li>
                                <li><a href="logout.php">ĐĂNG XUẤT&nbsp&nbsp&nbsp&nbsp</a></li>
                            </ul>
                        </nav>
                    <?php

                }
                else {
                    ?>
                        <nav style="float: right;">
                            <ul>
                                <li><a href="index.php">TRANG CHỦ&nbsp&nbsp&nbsp&nbsp</a></li>
                                <li><a href="books.php">TỦ SÁCH&nbsp&nbsp&nbsp&nbsp</a></li>
                                <li><a href="login.php">ĐĂNG NHẬP&nbsp&nbsp&nbsp&nbsp</a></li>
                                <li><a href="registration.php">ĐĂNG KÝ</a></li>               
                            </ul>
                        </nav>
                    <?php
                }

            ?>


        </header>


        <section>
            <div class="sec_img">
                <br><br>
                <div class="box">
                    <br><br><br><br>
                    <h1 style="text-align: center; font-size: 35px;">Thời gian làm việc</h1> <br><br>
                    <h1 style="text-align: center; font-size: 25px;">Mở cửa: 07:00</h1> <br>
                    <h1 style="text-align: center;font-size: 25px">Đóng cửa: 18:00</h1> <br>
                </div>
            </div>
        </section>


        <footer>
            <p style="color:#fff; text-align: center;">
                <br>
                Email: &nbsp dantruonghtno1@gmail.com <br><br>
                Mobile:&nbsp  +84984772

            </p>
        </footer>
    </div>
</body>
</html>