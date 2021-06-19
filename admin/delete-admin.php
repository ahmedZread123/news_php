<?php
include "../config\constants.php";

$id = $_GET['id'];
$sql = "delete  from admin where id= '$id' ";
$res = mysqli_query($coon , $sql);

if($res){

$_SESSION['admin'] = "admin is delete";
header("location:manage-admin.php");
}else{
  $_SESSION['admin'] = "admin is not delete";
  header("location:manage-admin.php");
}
