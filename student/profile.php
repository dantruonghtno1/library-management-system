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
    <title>Profile</title>
    <style type="text/css">
        .wrapper {
            width: 500px;
            height: 600px;
            margin: 0 auto;
            background-color: #222222;
            color: #fbfbfb;
            border-radius: 20px;
            margin-top:15px;
        }
        .btn-default {
            background-color: #3f51b5;
            border-color: #c40606;
        }
        .btn-default:hover {
            background-color: #03a9f4;
            border-color: #c40606;
        }
        .sec_img{
            background: url("./images/vnu_2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 542px;
    
        }

    </style>
</head>
<body style="background-color: #e2ebf0;">
    <div class="container">


        <div class="wrapper" >
            <?php
                if(isset($_POST['submit1'])) {
                    ?>
                        <script type="text/javascript">
                            window.location = "edit.php";
                        </script>
                    <?php
                }
                $sql = "SELECT * FROM `student` WHERE username = '$_SESSION[login_user]'";
                $q = mysqli_query($db,$sql);

            ?>
            <br>
            <h2 style="text-align: center;">Hồ sơ cá nhân</h2>
            <?php
                $row = mysqli_fetch_assoc($q);
                echo "<div style = 'text-align: center;'>
                        <img class = 'img-circle frofile-img' height = 110 width=120  src='./images/avata.jpg'>
                    </div>";


            ?>
            <br>
            <div style="text-align: center;">
                <h4>
                    <?php
                       echo $row['first'] ." ". $row['last'];
                    ?>
                </h4>            
            </div>
            <br>
            <?php
                echo "<b>";
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Họ: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['first'];
                    echo "</td>";

                echo "</tr>";
               
               
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Tên: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['last'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>User Name: </b>";
                    echo "</td>";
                    echo "<td>";
                         echo $row['username'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Mật khẩu: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['password'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>Email: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['email'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Số điện thoại: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo $row['contact'];
                    echo "</td>";
                echo "</tr>";
                


                

                echo "</table>";
                echo "</b>";
            ?>

            <br>
            <div style="padding-right: 170px;">
                <form action="" method="post">
                    <button  class="btn btn-default" style="float: right; width: 150px;" name="submit1">
                        Chỉnh sửa hồ sơ
                    </button>
                </form>
            </div>


        </div>
    </div>
</body>
</html>