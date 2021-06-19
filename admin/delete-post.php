<?php
include "../config\constants.php";

$id = $_GET['id'];
$sql = "delete  from post where id= '$id' ";
$res = mysqli_query($coon , $sql);

if($res){

$_SESSION['admin'] = "post is delete";
header("location:manage-post.php");
}else{
  $_SESSION['admin'] = "post is not delete";
  header("location:manage-post.php");
}
