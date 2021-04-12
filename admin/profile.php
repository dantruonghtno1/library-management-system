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
            height: 630px;
            margin: 0 auto;
            background-color: #222222;
            color: #fbfbfb;
            border-radius: 20px;
            margin-top:15px;
        }
    </style>
</head>
<body style="background-color: #e2ebf0;">
    <div class="container">
        <!-- <form action="" method="post">
            <button  class="btn btn-default" style="float: right; width: 150px;" name="submit1" type="submit">
                Chỉnh sửa hồ sơ
            </button>
        </form> -->

        <div class="wrapper" >

            <?php
                if(isset($_POST['submit1'])) {
                    ?>
                        <script text="text/javascript">
                            window.location="edit.php";
                        </script>

                    <?php
                }
                $sql = "SELECT * FROM `admin` WHERE username = '$_SESSION[login_user]'";
                $q = mysqli_query($db,$sql);
            ?>
            <br>
            <h2 style="text-align: center;">Hồ sơ cá nhân</h2><br>
            <?php
                $row = mysqli_fetch_assoc($q);
                echo "<div style = 'text-align: center;'>
                        <img class = 'img-circle frofile-img' height = 120 width=130  src='./images/avata.jpg'>
                    </div>";


            ?>
            <div style="text-align: center;"><b ></b>
            <br>
                <h4>
                    <?php
                        echo $row['first'] ." ". $row['last'];
                    ?>
                </h4>  
                <br>          
            </div>

            <?php
                echo "<b>";
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHọ: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        echo $row['first'];
                    echo "</td>";

                echo "</tr>";
               
               
                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTên: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        echo $row['last'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUser Name: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                         echo $row['username'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMật khẩu: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        echo $row['password'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEmail: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        echo $row['email'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSố điện thoại: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        echo $row['contact'];
                    echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</b>";
            ?>
            <br>
            <div style="padding-right: 170px;">
                <form action="" method="post">
                    <button  class="btn btn-default" style="float: right; width: 150px;" name="submit1" type="submit">
                        Chỉnh sửa hồ sơ
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>