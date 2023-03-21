<?php
    require "database.php";
    require "sanitizer.php";

    session_start();

    if(isset($_POST["email"])){

        $duplicateEmail = $conn->prepare("SELECT * FROM users WHERE email=:email");
        $duplicateEmail->bindParam("email",$_POST["email"]);
        $duplicateEmail->execute();
        $duplicateEmail = $duplicateEmail->fetch();

        //$validation = mainValidation(); 

        if(isset($duplicateEmail)){

            $hashedPassword = password_hash($_POST["password"],PASSWORD_DEFAULT);

            $newUser = $conn->prepare("INSERT INTO users(first_name,last_name,email,password,ip_address)
            VALUES (
                :first_name,
                :last_name,
                :email,
                :password,
                :ip_address
            )");
            
            $newUser->bindParam("first_name",$_POST["first_name"]);
            $newUser->bindParam("last_name",$_POST["last_name"]);
            $newUser->bindParam("email",$_POST["email"]);
            $newUser->bindParam("password",$hashedPassword);
            $newUser->bindParam("ip_address",$_POST["ip_address"]);
            $newUser->execute();
            $newUser = $newUser->fetch();
            
            $_SESSION["user"] = $_POST;

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
    <form action="register.php" method="POST">

        <input type="text" name="first_name" placeholder="First name">
        <input type="text" name="last_name" placeholder="Last name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <input type="text" name="ip_address" placeholder="IP address">
        
        <input type="submit" value="Register">
    </form>
</body>
</html>