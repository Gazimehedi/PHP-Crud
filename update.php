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

$id = $_REQUEST['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if(isset($_REQUEST['submit'])){
    $image_name = "";
    if(isset($_FILES['image'])){
        $path = "Upload/".$data['image'];
        unlink($path);
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
    $sql = "UPDATE `user` SET name='$name',email='$email',image='$image_name' WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        header('Location: /PHP-Crud/read.php');
    }else{
        echo "insert failed";
    }
}

?>
<body>
    <br><br>
    <h1>Update Data &nbsp;&nbsp;&nbsp;<a style="background:#ddd;padding:5px 15px; font-size:18px;" href="/PHP-Crud/read.php">Back</a></h1>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name" placeholder="Enter Name" value="<?php echo $data['name']; ?>" required>
        Email:<input type="email" name="email" placeholder="Enter Email" value="<?php echo $data['email']; ?>" required>
        Image:<input type="file" name="image" required>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>