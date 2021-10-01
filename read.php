<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
$sql = "SELECT * FROM user";
$query = mysqli_query($conn,$sql);
?>
<body>
    <br><br>
    <h1>Read Data &nbsp;&nbsp;&nbsp;<a style="background:#ddd;padding:5px 15px; font-size:18px;" href="/PHP-Crud/create.php">Create</a></h1>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </>
        <?php 
        while($list = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $list['id']; ?></td>
            <td><?php echo $list['name']; ?></td>
            <td><?php echo $list['email']; ?></td>
            <td><?php echo $list['image']; ?></td>
            <td><a href="/PHP-Crud/update.php?id=<?php echo $list['id']; ?>">Edit</a> || <a href="/PHP-Crud/delete.php?id=<?php echo $list['id']; ?>">Delete</a></td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>