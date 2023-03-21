<?php 
    require "database.php";
    
    session_start();

    if(isset($_GET["logout"])){
        $_SESSION = null;
        session_destroy();
    }
    
    if(isset($_POST["email"])){
       
        $user = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $user->bindParam("email",$_POST["email"]);
        $user->bindParam("password",$_POST["password"]);
        $user->execute();
        $user = $user->fetch();

        if(isset($user)){
            
            $_SESSION["user"] = $user;
            header("Location: dashboard.php");
        }
    }
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
    <?php if(isset($_SESSION["user"])){ ?>
        <a href="login.php?logout=true">Logout </a>
    <?php }?>

    <div></div>
    <a href="register.php">Create account</a>
    <form action="login.php" method="POST">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit">
    </form>
</body>
</html>