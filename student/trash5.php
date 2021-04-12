<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column1 {
  float: left;
  width: 40%;
  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
  border: 2px solid #aa1f1f;
}
.column2 {
  float: left;
  width: 40%;
  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.bookphoto{
    float: left;
    width: 100%;
    padding: 10px;
    height: 500px;
}
.column2 {
    padding-right: 30px;
    border: 2px solid #aa1f1f;
}
.btn-default{
    background-color: #2196f3;
}
.btn-default:hover{
    background-color: #00bcd4;
}
body {
    height: 100px;
}
</style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  height: 40px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<style>
     body{
            margin-top:20px;
            background-color:#e9ebee;
        }

        .be-comment-block {
            margin-bottom: 50px !important;
            border: 1px solid #edeff2;
            border-radius: 2px;
            padding: 50px 70px;
            border:1px solid #ffffff;
        }

        .comments-title {
            font-size: 16px;
            color: #262626;
            margin-bottom: 15px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-img-comment {
            width: 60px;
            height: 60px;
            float: left;
            margin-bottom: 15px;
        }

        .be-ava-comment {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .be-comment-content {
            margin-left: 80px;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        .be-comment-name {
            font-size: 13px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-comment-content a {
            color: #383b43;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        .be-comment-time {
            text-align: right;
        }

        .be-comment-time {
            font-size: 11px;
            color: #b4b7c1;
        }

        .be-comment-text {
            font-size: 13px;
            line-height: 18px;
            color: #7a8192;
            display: block;
            background: #f6f6f7;
            border: 1px solid #edeff2;
            padding: 15px 20px 20px 20px;
        }

        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;
        }
</style>
</head>
<body>

<h2></h2>
<div style="padding: 50px; padding-left:300px;">
   <div class="row">
    <div class="column column1" style="background-color:#aaa;">
        <img class="bookphoto" src="./images/avata.jpg" alt="">
    </div>
    <div class="column column2" style="background-color:white;" >
        <div style="padding-left: 100px; font-size:20px; border-color: coral;"> 
            <?php
                include "connection.php";
                $count = 0;
                $id = $_GET['id'];
                $sql = "SELECT * FROM `books` where bid = '$id'";
                $query = mysqli_query($db, $sql);

                $count = mysqli_num_rows($query);

                while($row = mysqli_fetch_assoc(($query))) {
                    echo "<h1><b>$row[name]</b> \n</h1>";
                    echo "<br>";
                    echo "<p><b>ID Sách:</b> $row[bid]</p>";
                    echo "<p><b>Tên Sách:</b> $row[name]</p>";
                    echo "<p><b>Tác giả:</b> $row[authors]</p>";
                    echo "<p><b>Phiên bản:</b> $row[edition]</p>";
                    echo "<p><b>Số lượng:</b> $row[quantity]</p>";
                    echo "<p><b>Nhà xuất bản:</b> $row[department]</p>";
                }     
            ?>
            <br><br>
            <BUTTon class= "btn btn-default">Mượn sách</BUTTon>

        </div>
    </div>
</div> 
</div>





<div style="color: black;">
    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
        <div class="be-comment-block">
            <h1 class="comments-title">Comments (3)</h1>
            <div class="be-comment">
                <div class="be-img-comment">	
                    <a href="blog-detail-2.html">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content">
                    
                        <span class="be-comment-name">
                            <a href="blog-detail-2.html">Ravi Sah</a>
                            </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            May 27, 2015 at 3:14am
                        </span>

                    <p class="be-comment-text">
                        Pellentesque gravida tristique ultrices. 
                        Sed blandit varius mauris, vel volutpat urna hendrerit id. 
                        Curabitur rutrum dolor gravida turpis tristique efficitur.
                    </p>
                </div>
            </div>
            <div class="be-comment">
                <div class="be-img-comment">	
                    <a href="blog-detail-2.html">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content">
                    <span class="be-comment-name">
                        <a href="blog-detail-2.html">Phoenix, the Creative Studio</a>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        May 27, 2015 at 3:14am
                    </span>
                    <p class="be-comment-text">
                        Nunc ornare sed dolor sed mattis. In scelerisque dui a arcu mattis, at maximus eros commodo. Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant. Proin ut ornare lectus, vel eleifend est. Fusce hendrerit dui in turpis tristique blandit.
                    </p>
                </div>
            </div>
            <div class="be-comment">
                <div class="be-img-comment">	
                    <a href="blog-detail-2.html">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content" >
                    <span class="be-comment-name">
                        <a href="blog-detail-2.html">Cüneyt ŞEN</a>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        May 27, 2015 at 3:14am
                    </span>
                    <div style="border-style: solid;">
                        <p class="be-comment-text"  >
                            Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
                        </p>
                    </div>
                </div>
            </div>
            <form class="form-block">
                <div class="row"><br>
                    <h2>Bình luận:</h2>
                    
                    <div>
                        <div class="form-group fl_icon" style="padding-right: 90px; border-style: solid;" >
                            <input class="form-input" type="text" placeholder="Your name">
                        </div>
                    </div><br>
                    <div style="padding-right: 90px; border-style: solid;" >
                        <div class="form-group fl_icon">
                            
                            <input class="form-input" type="text" placeholder="Your email">
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-12" style="padding-right: 90px; border-style: solid;">									
                        <div class="form-group">
                            <textarea class="form-input" required="" placeholder="Your text"></textarea>
                        </div>
                    </div>
                    <div style="    padding-right: 100px;">
                        <button style="float: right;background-color: #2196f3; height:30px;width:80px; border-radius: 10%;" class="btn btn-default">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
        </div>
    </body>
</div>

</body>
</html>
