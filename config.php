<?php 
    //include_once('db.php');
    $con = mysqli_connect("localhost", "root", "huiyi123", "reset_password");
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }else{
        echo "";
    }