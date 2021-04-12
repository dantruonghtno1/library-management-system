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
    <title>edit profile</title>
    <style type="text/css">
        .form-control {
            width: 350px;
            height: 38px;
            border: 2px solid #200303;
            
        }
        form {
            padding-left: 600px;
        }
        label {
            margin: 0px 0px;
            line-height: 1.3;
        }
        .btn-default:hover {
            opacity: 0.7;
        }
        .btn-default {
            border: 2px solid #200303;
        }

    </style>
</head>
<body style="background-color: #e2ebf0;">
<br>
    <h2 style="text-align: center; color:black;">Thay đổi thông tin</h2>
    
    <?php
        $sql = "SELECT * from admin where username = '$_SESSION[login_user]';";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $first = $row['first'];
            $last = $row['last'];
            $username = $row['username'];
            $pass = $row['password'];
            $email = $row['email'];
            $contact =$row['contact'];
        }


    ?>
    <div class= "profile_info" style="text-align: center;">
        <!-- <span style="font-size: 30px;">Welcome</span> -->
        
    </div><br>
    <form action="" method="post" enctype="multipart/form-data">
        <label for=""><h4><b>Họ: </b></h4></label>
        <input class="form-control" type="text" name="first" value="<?php echo $first; ?> ">
        <label for=""><h4><b>Tên: </b></h4></label>
        <input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
        <label for=""><h4><b>User name:</b></h4></label>
        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
        <label for=""><h4><b>Mật khẩu:</b></h4></label>
        <input class="form-control" type="text" name="pass" value="<?php echo $pass; ?>">
        <label for=""><h4><b>Email:</b></h4></label>
        <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
        <label for=""><h4><b>Số điện thoại:</b></h4></label>
        <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>"><br>
        <div style="padding-left: 130px;">
			<button class="btn btn-default" style="background-color: #5668c9;" type="submit" name="submit">Cập nhật</button></div>
    </form>

    <?php
		if(isset($_POST['submit']))
		{
			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['pass'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$sql1= "UPDATE admin SET first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}

    ?>

</body>
</html>