<?php
include "config.php";
$id = $_REQUEST['id'];

$sql = "DELETE FROM user WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    header("location: /PHP-Crud/read.php");
}
