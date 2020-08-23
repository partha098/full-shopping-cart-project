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

$ins="INSERT INTO morder SET bn='$bn',be='$be',bp='$bp',ba='$ba',sn='$sn',se='$se',sp='$sp',sa='$sa',odate='$odate',cid='$cid'";
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

?>


<form method="post" action="pgRedirect.php" id="frm" style="display: none;">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $total; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>


	<script>
		document.getElementById("frm").submit();
	</script>