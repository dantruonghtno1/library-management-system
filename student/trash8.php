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
    <title>Document</title>
    <style>
        html,body{
  font-family: 'Source Sans Pro', sans-serif;
  margin: 0;
  padding: 0;
}
.graph-cont{
  width: calc(100% - 40px);
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}
h1,h2,h3{
  text-align: center;
  color: #34495e;
}
.bar{
  height: 30px;
  max-width: 800px;
  margin: 0 auto 10px auto;
  line-height: 30px;
  font-size: 16px;
  color: gray;
  padding: 0 0 0 10px;
  position: relative;
}
.bar::before{
  content: '';
  width: 100%;
  position: absolute;
  left: 0;
  height: 30px;
  top: 0;
  z-index: -2;
  background: #ecf0f1;
}
.bar::after{
  content: '';
  background: #2ecc71;
  height: 30px;
  transition: 0.7s;
  display: block;
  width: 100%;
  -webkit-animation: bar-before 1 1.8s;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}
.bar1::after{
  max-width: 60%;
}
.bar2::after{
  max-width: 72%;
}
.bar3::after{
  max-width: 47%;
}
.bar4::after{
  max-width: 20%;
}
@-webkit-keyframes bar-before{
  0%{
    width: 0px;
  }
  100%{
    width: 100%;
  }
}

.how-cont{
  width: calc(100% - 40px);
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}
code {
  padding: 5px;
  background: #ecf0f1;
  display: block;
}
pre{
  padding: 0;
  margin: 0;
}
    </style>
</head>
<body>
    <?php  
        // select bid , count(*), sum(label), ROUND(sum(label)*100/count(*), 2) as percent from comments GROUP by bid
        include "connection.php";
        $count = 0;
        $sql = "select bid , count(*), sum(label), ROUND(sum(label)*100/count(*), 2) as percent from comments GROUP by bid";
        $query = mysqli_query($db, $sql);

        $count = mysqli_num_rows($query);
        echo "<div class='graph-cont'>";
        echo "<h1>Top 5 sách phản hồi tích cực nhất</h1><br>";
        while($row = mysqli_fetch_assoc(($query))) {
            // $percent = $row[3];
            // echo "<div class='graph-cont'>";
            echo "<div class='bar' style = 'width: calc(100% - 40px); width: 100%; max-width: 800px;margin: 0 auto; max-width: $row[percent]%;   '>BID: $row[bid]  \t $row[percent]%</div>";
            echo "<br>";
            echo '</div>';
            echo "<div class='bar bar1'>60%</div>";
            
        }
        echo "</div>";
        

    ?>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>

        <div class="graph-cont" style="text-align: left;">
            <h1>Top 5 sách phản hồi tích cực nhất</h1><br>
           
            <div class="bar" style='max-width: 60%;text-align: left; '>60%</div>
            <div class="bar" style='max-width: 72%;'>72%</div>
            <div class="bar" style='max-width: 47%;'>47%</div>
            <div class="bar" style='max-width: 20%;text-align: left;'>20%</div>
        </div>

</body>
</html>