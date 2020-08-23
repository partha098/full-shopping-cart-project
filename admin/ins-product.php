<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header("location:index.php");
}
include("../inc/db.php");

$cat=$_POST['cat'];
$pname=$_POST['pname'];
$price=$_POST['price'];
$fn=time().$_FILES['pimg']['name'];
$buf=$_FILES['pimg']['tmp_name'];
move_uploaded_file($buf, "../product_img/".$fn);

$ins="INSERT INTO product SET name='$pname',category='$cat',price='$price',pimg='$fn'";
$con->query($ins);

header("location:list-product.php");

?>