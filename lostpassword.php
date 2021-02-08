<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('config.php'); 
    $oldp = $_GET["p"];//old password. Whenever they get the email there, in the a tag, there is a link with ...php?p= $password, 
    //that's the password in database, click on the link it will come to this php file, with a ? after .php. Get the url variable, the string
    ?> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Get Password</title>
</head>
<body>
    <div id="container">
    <?php
        $result = $con -> query("SELECT * FROM users WHERE password='$oldp' LIMIT 1");
        $total = $result -> num_rows;
        if(!$total) {//somebody wants to reset somebody else's password'
            echo '<div class="alert alert-warning">Is it not a wonderful day? 404 Error page not found</div>';
        }else {
            while($row = $result -> fetch_assoc()) {
                $email = $row['email'];
            }
            echo '<div class="form-group">
            <label for="password">New password: </label>
            <input id="password" class="form-control" type="password" placeholder="New password">
            </div>
            <input type="hidden" id="email" value="'.$email.'"/>
            <button type="submit" id="submit" class="btn btn-default">Change password</button>
            <div id="display"></div>';
            echo '<script>
                $(document).ready(() => {
                    $("#submit").click(() => {
                        var pw = $("#password").val();
                        var em = $("#email").val();
                        var dataString = "pw1="+ pw + "&em1=" + em;
                        $.ajax({
                            type: "POST",
                            url: "lostpasswordprocessor.php",
                            data: dataString,
                            cache: false,
                            success: (result) => {
                                $("#display").html(result);
                            }
                        });
                        return false;
                    });
                });
            </script>';            
        }        
    ?>
    </div>
</body>
</html>