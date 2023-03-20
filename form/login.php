<?php
    require_once('includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<!--login form-->
<form action="../users/login.php" method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="Email"><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Password">

    <button type="submit" name="userlogin_submit">Login</button>
</form>
</body>
</html>


<?php
    require_once('includes/footer.php');
?>