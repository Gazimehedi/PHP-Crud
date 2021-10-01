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

if(isset($_REQUEST['submit'])){
    $image_name = "";
    if(isset($_FILES['image'])){
        $image = $_FILES['image'];
        $rq_image_name = $image['name'];
        $tmp_name = $image['tmp_name'];
        $file_exp = explode('.', $rq_image_name);
        $file_ext = end($file_exp);
       //$file_ext = strtolower(end($file_exp));
        $image_name = "mh_".rand(111111111,999999999).".".$file_ext;
        move_uploaded_file($tmp_name,"upload/".$image_name);
    }
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $sql = "INSERT INTO `user` (name,email,image) VALUES ('$name','$email','$image_name')";
    if(mysqli_query($conn,$sql)){
        echo "insert successfully";
    }else{
        echo "insert failed";
    }
}

?>
<body>
    <br><br>
    <h1>Create Data &nbsp;&nbsp;&nbsp;<a style="background:#ddd;padding:5px 15px; font-size:18px;" href="/PHP-Crud/read.php">Show</a></h1>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name" placeholder="Enter Name" required>
        Email:<input type="email" name="email" placeholder="Enter Email" required>
        Image:<input type="file" name="image" required>
        <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>