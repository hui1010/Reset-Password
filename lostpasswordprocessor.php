<?php 
    include_once('config.php');

    $pw = mysqli_real_escape_string($con, $_POST['pw1']);
    $pwclean = filter_var($pw, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $hash = sha1(md5($pwclean));
    $em = mysqli_real_escape_string($con, $_POST['em1']);
    $emclean = filter_var($em, FILTER_SANITIZE_EMAIL);

    //update the password in the database
    mysqli_query($con, "UPDATE users SET password= '$hash' WHERE email= '$emclean' ");
    echo '<div class="alert alert-success">Your password has changed <a href="#">Log in here</a></div>';
    $con -> close();