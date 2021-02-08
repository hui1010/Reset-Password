<?php 
    include_once('config.php');
    $email = mysqli_real_escape_string($con, $_POST['em1']);
    $emailclean = filter_var($email, FILTER_SANITIZE_EMAIL);
    //Query the databse and save the result
    $result = $con -> query("SELECT * FROM users WHERE email='$emailclean' LIMIT 1");
    $total = $result -> num_rows;
    //if we don't get any email back
    if($total < 1) {
        echo '<div class="alert alert-warning">Are you sure you entered the correct email?</div>';
        die();
    }
    //if we do get some result back, we want to grap the email and password using a while loop
    while($row = $result -> fetch_assoc()) {
        $emaill = $row['email'];
        $password = $row['password'];
    }
    //email the form to the person who lost their password
    $subject = 'PASSWORD REST LINK';
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";//so we can send a table down below
    $headers .= 'From: <huiyistestmailserver@gmail.com>'."\r\n";
    $message = '<table width= "100%" border = "1">
    <tr><td colspan="2" align="center">RESET YOUR PASSWORD BY CLICKING LINK BELOW</td></tr>
    <tr><td colspan="2" align="center">If you did not make this request, please ignore this email</td></tr>
    <tr><td colspan="2" align="center"><a href="http://localhost:4000/lostpassword.php?p='.$password.'">Reset Password</a></td></tr>
    </table>';
    mail($emaill, $subject, $message, $headers);//For sending the email
    
    //send message back to AJAX
    echo '<div class="alert alert-success">An email has been sent to '. $email. ' with a password reset link.</div>';
    $con -> close();
