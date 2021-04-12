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
            padding-left: 850px;

        }
        .form-control {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
            /* margin-right: 300px; */
        }
        .btn-default {
            margin-right: 300px;
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
        .container {
            height: 700px;
            background-color: black;
            color: white;
            opacity: 0.8;
            text-align: center;
        }
        .scroll {
            width: 100%;
            height: 700px;
            overflow: auto;
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
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
    
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    

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
    <div class="container">
        <h2 style="text-align: center;">Informatioh of Borrowed Books</h2>
        <?php
            $c = 0;
            if(isset($_SESSION['login_user'])){
                $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
                $res = mysqli_query($db, $sql);
                
                if(mysqli_num_rows($res) == 0) {
                    echo "<h2><b>";
                    echo "There's no books borrowed";
                    echo "</h2></b>";
                }
                else{
                    echo "<div class = 'scroll'>";
                    echo "<table class='table table-bordered table-hover' >";
                    
                    echo "<tr style = 'background-color: #6db6b9e6; '>";
            
                        echo "<th>"; echo "Student username"; echo "</th>";
                        echo "<th>"; echo "Roll"; echo "</th>";
                        echo "<th>"; echo "Bid"; echo "</th>";
                        echo "<th>"; echo "Book Name"; echo "</th>";
                        echo "<th>"; echo "Authors name"; echo "</th>";
                        echo "<th>"; echo "Edition"; echo "</th>";
                        echo "<th>"; echo "Issue date"; echo "</th>";
                        echo "<th>"; echo "Return date"; echo "</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($res)) {
                        $d = date("Y-m-d");
                        $d=date("Y-m-d");
                        if($d > $row['return'])
                        {
                          $c=$c+1;
                          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                
                          mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
                          
                          echo $d."</br>";
                        }
                        echo "<tr>";
                            echo "<td>"; echo $row['username']; echo "</td>";
                            echo "<td>"; echo $row['roll']; echo "</td>";
                            echo "<td>"; echo $row['bid']; echo "</td>";
                            echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['authors']; echo "</td>";
                            echo "<td>"; echo $row['edition']; echo "</td>";
                            echo "<td>"; echo $row['issue']; echo "</td>";
                            echo "<td>"; echo $row['return']; echo "</td>";

                        echo "</tr>";                        
                    }
                    echo "</div>";
                    echo "</table>";
                }
            }
            else {
                ?>
                    <h3 style="text-align: center;">Login to see information of borrowed books</h3>


                <?php
            }

        ?>
    </div>
    </div>
</body>
</html>