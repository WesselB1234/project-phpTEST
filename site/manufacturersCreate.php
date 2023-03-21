<?php 

    require "database.php";

    if(isset($_POST["name"])){
        $create = $conn->prepare("INSERT INTO manufacturers(name) VALUES (:name)");
        $create->bindParam("name",$_POST["name"]);
        $create->execute();

        header("location: manufacturers.php");
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
    <form action="manufacturersCreate.php" method="POST">
        <input type="text" name="name" placeholder="name">
    </form>
</body>
</html>