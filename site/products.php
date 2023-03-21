<?php 
    require "database.php";

    $products = $conn->prepare("SELECT products.name,products.price,products.id,manufacturers.name as 'manufacturer_name' FROM products JOIN manufacturers ON manufacturers.id = products.manufacturer");
    $products->execute();
    $products = $products->fetchAll();
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
    <a href="productCreate.php">Create</a>

    <table>
        <thead>
            <th>
                id
            </th>
            <th>
                name
            </th>
            <th>
                price
            </th>
            <th>
                manufacturer
            </th>
        </thead>
        <tbody>
            <?php foreach($products as $product) {?>
                <tr>
                    <td>    
                        <?php echo $product["id"];?>
                    </td>
                    <td>
                        <?php echo $product["name"];?>
                    </td>
                    <td>
                        <?php echo $product["price"];?>
                    </td>
                    <td>
                        <?php echo $product["manufacturer_name"];?>
                    </td>
                    <td>
                        <a href="products.php?delete=<?php echo $product["id"]?>">Delete</a>
                    </td>
                    <td>
                        <a href="productEdit.php?id=<?php echo $product["id"]?>">Edit</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>