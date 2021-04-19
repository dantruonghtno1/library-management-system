
<?php

use function PHPSTORM_META\type;

include "connection.php";
    include "navbar.php";
?>
<?php
   include "connection.php";
   $count = 0;
   $sql = "select bid , count(*), sum(label), ROUND((sum(label)+1)*100/(count(*)+2), 2) as percent from comments GROUP by bid HAVING percent >= 50";
   $query = mysqli_query($db, $sql);
 
   $count = mysqli_num_rows($query);

    $dataPoints = array();
    $bidarr = array();
    while($row = mysqli_fetch_assoc(($query))) {
      array_push($bidarr, $row['bid']);
      $curr = array("label"=>"Book ID".' '.$row['bid'], "y"=> $row['percent']);
      array_push($dataPoints, $curr);
    }

   
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   theme: "light2", // "light1", "light2", "dark1", "dark2"
   title: {
     text: "Top những cuốn sách được đánh giá tốt nhất"
   },
   axisY: {
     title: "Phần  trăm  đánh  giá"
   },
   data: [{
     type: "column",
       yValueFormatString: "#,##0\"%\"",
      indexLabel: "{y}",
      indexLabelPlacement: "inside",
      indexLabelFontColor: "white",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

 <div style="padding-left: 50px;">
 <br><br>
  <h2><b>Trong đó:</b></h2>
  <?php
     include "connection.php";
     $count = 0;
     $sql = "select bid , count(*), sum(label), ROUND((sum(label)+1)*100/(count(*)+2), 2) as percent from comments GROUP by bid HAVING percent >= 50";
     $query = mysqli_query($db, $sql);
   
     $count = mysqli_num_rows($query);
  
      $dataPoints = array();
      $bidarr = array();
      while($row = mysqli_fetch_assoc(($query))) {
        array_push($bidarr, $row['bid']);
      }
      // var_dump($bidarr);

      foreach ($bidarr as $value) {
        $value = (int) $value;
        // echo gettype ( $value );
        include "connection.php";
        $querysql = "select name, bid from books where bid = $value";
        $res = mysqli_query($db, $querysql);
        echo "<ul class='list-group'>";
        while($r = mysqli_fetch_assoc($res)) {

          echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
          echo "<h3><b>Book ID $r[bid]:   </b> $r[name] <br></h3>";
          echo "</li>";
        }

      }

  ?>
 </div>

 <div style="padding-left:50px;">
      <h2><b>Chú ý:</b></h2>
      <h3>Percent nhỏ hơn 50% là đánh giá thấp, percent = 50% là bình thường percent > 50% là được đánh giá cao</h3>
 </div>
 </body>
 </html> 