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
        <input type="hidden" name="create" value="create">
        <td>
            <input type="text" name="first_name" placeholder="First name">
        </td>
        <td>
            <input type="text" name="last_name" placeholder="Last name">
        </td>
        <td>
            <input type="text" name="email" placeholder="Email">
        </td>
        <td>
            <input type="text" name="password" placeholder="Password">
        </td>
        <td>
            <input type="text" name="ip_address" placeholder="IP address">
        </td>
        <td>
            <input type="submit" value="Create">
        </td>
    </form>
</body>
</html>