<?php
            include "connection.php";
            $first = 'admin1';
            $last = 'admin1';
            $username = 'admin1';
            $pass = 'admin1';
            $email = 'admin1';
            $contact ='admin1';
            $sql = "UPDATE admin SET first = '$first', last = '$last', username ='$username', password = '$pass', email ='$email', contact ='$contact';";
            mysqli_query($db, $sql);


    ?>