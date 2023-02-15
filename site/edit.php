<?php

    require "database.php";

    $user = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $user->bindParam("id",$_GET["id"]);
    $user->execute();
    $user = $user->fetchAll()[0];
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
    <form action="index.php" method="POST">
        <input type="hidden" name="edit" value="<?php echo $user["id"];?>">
        <td>
            <input type="text" name="first_name" value="<?php echo $user["first_name"] ?>">
        </td>
        <td>
            <input type="text" name="last_name" value="<?php echo $user["last_name"] ?>">
        </td>
        <td>
            <input type="text" name="email" value="<?php echo $user["email"] ?>">
        </td>
        <td>
            <input type="text" name="password" value="<?php echo $user["password"] ?>">
        </td>
        <td>
            <input type="text" name="ip_address" value="<?php echo $user["ip_address"] ?>">
        </td>
        <td>
            <input type="submit" value="edit">
        </td>
    </form>
</body>
</html>