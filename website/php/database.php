<?php
    $user = 'u22_tuD90gwbH4';
    $pass = '29D2vcBCIDVHjy7PXN1jEr9p';
    $db = 's22_ledenadministration';
    $host = '46.4.89.19:3306';

    $conn = new mysqli($host, $user, $pass, $db, 3306) or die("Unable to connect");
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>