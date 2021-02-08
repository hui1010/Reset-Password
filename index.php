<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="email"> Email:</label>
            <input type="email" id="email" class="form-control" placeholder="Your email...">
        </div>
        <button type="submit" id="submit" class="btn btn-default">Reset Password</button>
        <div id="display"></div>
    
        <script>
            $(document).ready(() => {
                $("#submit").click(() => {
                    var em = $("#email").val();
                    var dataString = 'em1=' + em;
                    $.ajax({
                        type: "POST",
                        url: "processor.php",
                        data: dataString,
                        cache: false,
                        success: (result) => {
                            $("#display").html(result);
                        }
                    });
                    return false;
                });
            });        
        </script>
    </div>    
</body>
</html>