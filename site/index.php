<?php

    require "database.php";

    function validateEmail(){
        
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            return true;
        }
        
        return false;
    }

    function validateIpAddress(){
        
        if(filter_var($_POST["ip_address"],FILTER_VALIDATE_IP)){
            return true;
        }

        return false;
    }

    function mainValidation(){

        $validationMethods = [validateEmail(),validateIpAddress()];

        foreach($validationMethods as $method){

            if($method == false){
                return false;
            }
        }

        $_POST["first_name"] = filter_var($_POST["first_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["last_name"] = filter_var($_POST["last_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["password"] = filter_var($_POST["password"],FILTER_SANITIZE_SPECIAL_CHARS);

        return true;
    }

    if(isset($_GET["delete"])){

        $delete = $conn->prepare("DELETE FROM users WHERE id =:id");
        $delete->bindParam("id",$_GET["delete"]);
        $delete->execute();
    }

    if(isset($_POST["create"])){

        $validation = mainValidation();

        if($validation){

            $create = $conn->prepare("INSERT INTO users(first_name,last_name,email,password,ip_address)
            VALUES (
                :first_name,
                :last_name,
                :email,
                :password,
                :ip_address
            )");
            
            $create->bindParam("first_name",$_POST["first_name"]);
            $create->bindParam("last_name",$_POST["last_name"]);
            $create->bindParam("email",$_POST["email"]);
            $create->bindParam("password",$_POST["password"]);
            $create->bindParam("ip_address",$_POST["ip_address"]);
            $create->execute();
        }
    }

    if(isset($_POST["edit"])){

        $validation = mainValidation();

        if($validation){

            $update = $conn->prepare("UPDATE users 
            SET 
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                password = :password,
                ip_address = :ip_address 
            
            WHERE id = :id");
        
            $update->bindParam("first_name",$_POST["first_name"]);
            $update->bindParam("last_name",$_POST["last_name"]);
            $update->bindParam("email",$_POST["email"]);
            $update->bindParam("password",$_POST["password"]);
            $update->bindParam("ip_address",$_POST["ip_address"]);
            $update->bindParam("id",$_POST["edit"]);
            $update->execute();
        }
    }

    $select = $conn->prepare("SELECT * FROM users");
    $select->execute();
    $userArray = $select->fetchAll();
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
<table>
    <a href="create.php">create</a>
    <?php foreach($userArray as $user){?>
        <tr>
            <td>
                <?php echo $user["id"];?>
            </td>
            <td>
                <?php echo $user["first_name"];?>
            </td>
            <td>
                <?php echo $user["last_name"];?>
            </td>
            <td>
                <?php echo $user["email"];?>
            </td>
            <td>
                <?php echo $user["password"];?>
            </td>
            <td>
                <?php echo $user["ip_address"];?>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $user["id"]?>">Edit</a>
            </td>
            <td>
                <a href="index.php?delete=<?php echo $user["id"];?>">Delete</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>