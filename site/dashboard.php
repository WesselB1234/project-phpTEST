<?php
    session_start();

    print_r($_SESSION);

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }

    $user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><?php echo $user["email"]?></div>

    <a href="login.php?logout=true">Logout</a>


    <div><H3>Dashboard</H3></div>
</body>
</html>