<?php
session_start();
include("inc/db.php");

$bn=$_POST['bn'];
$be=$_POST['be'];
$bp=$_POST['bp'];
$ba=$_POST['ba'];
$sn=$_POST['sn'];
$se=$_POST['se'];
$sp=$_POST['sp'];
$sa=$_POST['sa'];

$odate=time();
$cid=$_SESSION['cid'];

$ins="INSERT INTO morder SET bn='$bn',be='$be',bp='$bp',ba='$ba',sn='$sn',se='$se',sp='$sp',sa='$sa',odate='$odate',cid='$cid',payemt_status='success'";
$con->query($ins);
 $moid = $con->insert_id;

$_SESSION['moid']=$moid;

$sel="SELECT * FROM cart WHERE cid='$cid'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){

      	$pid=$row['pid'];
      	$qty=$row['qty'];
      	$price=$row['price'];
      	$total=$total+($row['price']*$row['qty']);


     $icart="INSERT INTO sorder SET moid='$moid',pid='$pid',qty='$qty',price='$price'";
     $con->query($icart);

      	}

      	$del="DELETE FROM cart WHERE cid='$cid'";
      	$con->query($del);

      	header("location:thanks.php");

?>

