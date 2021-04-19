<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>

    </title>

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
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">UET LIBRARY</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="books.php">TỦ SÁCH</a></li>
                <!-- <li><a href="feedback.php">FEEDBACK</a></li> -->
            </ul> 
            <?php
                if(isset($_SESSION['login_user']))
                {   ?>

                        <ul class="nav navbar-nav">
                            <li><a href="profile.php">HỒ SƠ</a></li>
                            <li><a href="fine.php">TIỀN PHÍ</a></li>
                            <li><a href="chart.php">SÁCH HAY</a></li>
                            <li><a href="request.php">ĐANG CHỜ DUYỆT</a></li>
                            <li><a href="expired.php">QUÁ HẠN</a></li>
                        </ul>

                   
                        <ul class="nav navbar-nav navbar-right">
                        <li><a href="">
                            <div style="color: white;">
                                <?php
                                    echo "Welcome ".$_SESSION['login_user']; 
                                ?>
                            </div>                        
                        </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> ĐĂNG_XUẤT</span> </a></li>
                        </ul>
                    <?php
                }
                else {
                    ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> ĐĂNG_NHẬP</span> </a></li>
                        
                            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> ĐĂNG_KÝ</span> </a></li>
                        </ul>  
                    <?php                  
                }

            ?>


        </div>
    </nav>

    <?php
        if(isset($_SESSION['login_user'])) {
            include "connection.php";
            $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
            $res = mysqli_query($db, "SELECT * FROM issue_book WHERE username = '$_SESSION[login_user]' AND approve ='$var'");
            $day = 0;
            while ($row = mysqli_fetch_assoc($res)){
                $d = strtotime($row['return']);
                $c = strtotime(date("Y-m-d"));

                $diff = $c - $d;
                if($diff>0) {
                    $day = floor($diff/(60*60*24));
                    // echo $day;
                    $_SESSION['day'] = $day;
                }
            }
            $_SESSION['fine'] = $day*5000;
        }
    
    ?>
</body>
</html>