<?php 

    require "database.php";

    $manufacturers = $conn->prepare("SELECT * FROM manufacturers");
    $manufacturers->execute();
    $manufacturers = $manufacturers->fetchAll();

    if(isset($_POST["product_name"])){
        
        $create = $conn->prepare("INSERT INTO products(name,price,manufacturer) VALUES (:name,:price,:manufacturer)");
        $create->bindParam("name",$_POST["product_name"]);
        $create->bindParam("price",$_POST["price"]);
        $create->bindParam("manufacturer",$_POST["manufacturer_id"]);
        $create->execute();

        header("location: products.php");
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
    <form action="productCreate.php" method="POST">

        <input type="text" name="product_name" placeholder="name">
        <input type="text" name="product_price" placeholder="price">
        
        <select name="manufacturer_id">
            <?php foreach($manufacturers as $manufacturer){?>
                <option value="<?php echo $manufacturer["id"]?>"><?php echo $manufacturer["name"]?></option>
            <?php } ?>
        </select>

        <input type="submit">
    </form>
</body>
</html>