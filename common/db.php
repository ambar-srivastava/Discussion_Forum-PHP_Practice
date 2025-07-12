<?php
    $host = "localhost";
    $username = "root";
    $password = null;
    $database = "discuss";

    $connection = new mysqli($host, $username, $password, $database);

    if($connection->connect_error){
        die("not connected with DB ". $connection->connect_error);
    }

    echo "db connected ";
?>