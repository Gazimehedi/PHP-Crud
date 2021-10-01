<?php
include "config.php";
$id = $_REQUEST['id'];
$sql0 = "SELECT * FROM user WHERE id='$id'";
$query = mysqli_query($conn, $sql0);
$data = mysqli_fetch_assoc($query);
$path = "Upload/".$data['image'];
unlink($path);
$sql = "DELETE FROM user WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    header("location: /PHP-Crud/read.php");
}
