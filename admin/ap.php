<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header("location:index.php");
}
include("../inc/db.php");

$id=$_GET['id'];

$upd="UPDATE ratting SET isapproved='1' WHERE id='$id'";
$con->query($upd);

header("location:ratting.php");

?>