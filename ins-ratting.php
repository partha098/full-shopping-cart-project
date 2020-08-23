<?php
session_start();
include("inc/db.php");
if(isset($_POST['savert'])){

	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$ratting=$_POST['rating'];
	$rv=$_POST['rv'];
	$pid=$_POST['pid'];

	$ins="INSERT INTO ratting SET name='$name',phone='$phone',ratting='$ratting',review='$rv',pid='$pid'";
	$con->query($ins);

	?>
	<script >
		alert("Your review under modaration");
		window.location='details.php?id=<?php echo $pid ?>';
	</script>

	<?php

}
?>