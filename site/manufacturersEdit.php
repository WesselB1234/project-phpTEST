<?php 

    require "database.php";
    
    $id = $_GET["id"];
    $currentManufacturer = $conn->prepare("SELECT * FROM manufacturers WHERE id = :id");
    $currentManufacturer->bindParam("id",$id);
    $currentManufacturer->execute();
    $currentManufacturer = $currentManufacturer->fetch();

    if(isset($_POST["name"])){
        
        $id = $_GET["id"];
        $update = $conn->prepare("UPDATE manufacturers SET name = :name WHERE id = :id");
        $update->bindParam("name",$_POST["name"]);
        $update->bindParam("id",$id);
        $update->execute();

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
    <form action="manufacturersEdit.php?id=<?php echo $currentManufacturer["id"]?>" method="POST">
        <input type="text" name="name" placeholder="Name" value="<?php echo $currentManufacturer["name"]?>">
    </form>
</body>
</html>