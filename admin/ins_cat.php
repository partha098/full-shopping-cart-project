<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header("location:index.php");
}
include("../inc/db.php");

$p=$_POST['parent'];
$c=$_POST['cat'];
$ins="INSERT INTO category SET name='$c',parent_id='$p'";
$con->query($ins);

header("location:categories.php");

?>