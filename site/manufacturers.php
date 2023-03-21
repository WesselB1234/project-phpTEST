<?php 

    require "database.php";

    if(isset($_GET["delete"])){
        $id = $_GET["delete"];
        $delete = $conn->prepare("DELETE FROM manufacturers WHERE id = :id");
        $delete->bindParam("id",$id);
        $delete->execute();
    }

    $manufacturers = $conn->prepare("SELECT * FROM manufacturers");
    $manufacturers->execute();
    $manufacturers = $manufacturers->fetchAll();
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
    <a href="manufacturersCreate.php">Create</a>
    <table>
        <thead>
            <th>
                id
            </th>
            <th>
                name
            </th>
        </thead>
        <tbody>
            <?php foreach($manufacturers as $manufacturer) {?>
                <tr>
                    <td>    
                        <?php echo $manufacturer["id"];?>
                    </td>
                    <td>
                        <?php echo $manufacturer["name"];?>
                    </td>
                    <td>
                        <a href="manufacturersEdit.php?id=<?php echo $manufacturer["id"]?>">Edit</a>
                    </td>
                    <td>
                        <a href="manufacturers.php?delete=<?php echo $manufacturer["id"]?>">Delete</a>
                    </td>
                    <td>
                        <a href="products.php?manufacturer=<?php echo $manufacturer["id"]?>">View products</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>