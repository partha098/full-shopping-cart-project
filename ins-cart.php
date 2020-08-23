<?php
session_start();
include("inc/db.php");
$pid=$_POST['pid'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$cid=$_SESSION['cid'];

$sel="SELECT * FROM cart WHERE pid='$pid' AND cid='$cid'";
$rs=$con->query($sel);
if($rs->num_rows>0){

while($row=$rs->fetch_assoc()){
	$fqty=$row['qty']+$qty;
	$cart_id=$row['id'];
	$upd="UPDATE cart SET qty='$fqty' WHERE id='$cart_id'";
	$con->query($upd);
}

}
else{
$ins="INSERT INTO cart SET pid='$pid',cid='$cid',qty='$qty',price='$price'";
$con->query($ins);
}

header("location:cart.php");

?>