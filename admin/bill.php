<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header("location:index.php");
}
include("../inc/db.php");

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">

	<p>Bill no. SW<?php echo str_pad($_GET['id'],"8","0",STR_PAD_LEFT); ?></p>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">Softaweb</h1>
			<p style="text-align: center;">Zero to hero in web development</p>
			<?php
			$id=$_GET['id'];
      $sel="SELECT * FROM morder WHERE id='$id'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){

      ?>
      <div class="row">
        <div class="col-md-6">
        <p>Billing name: <?php echo $row['bn'] ?></p>
        <p>Billing email: <?php echo $row['be'] ?></p>
        <p>Billing phone: <?php echo $row['bp'] ?></p>
        <p>Billing address: <?php echo $row['ba'] ?></p>
      </div>
              <div class="col-md-6">
        <p>Shipping name: <?php echo $row['sn'] ?></p>
        <p>Shipping email: <?php echo $row['se'] ?></p>
        <p>Shipping phone: <?php echo $row['sp'] ?></p>
        <p>Shipping address: <?php echo $row['sa'] ?></p>
      </div>
  </div>

      <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      <?php $moid=$row['id'];
       $total=0;
        $sels="SELECT * FROM sorder WHERE moid='$moid'";
        $rss=$con->query($sels);
        while($rows=$rss->fetch_assoc()){

        	$pid=$rows['pid'];

          $selp="SELECT * FROM product WHERE id='$pid'";
          $rsp=$con->query($selp);
          while($rowp=$rsp->fetch_assoc()){

          	$total=$total+($rows['qty']*$rows['price']);

        	?>

    <tr>
        <td><?php echo $rowp['pname']?></td>
        <td><?php echo $rows['price']?></td>
        <td><?php echo $rows['qty']?></td>
        <td><?php echo $rows['qty']*$rows['price'];?></td>
      </tr>



        <?php
      }

          } ?>

          <tr>
          	<th colspan="3">Sub Total</th>
          	<th><?php echo $total; ?></th>
          </tr>


      </tbody>
  </table>


  <?php  } ?>





		
	</div>
</div>
<div class="row" style="margin-top: 100px;">
		<div class="col-md-6">
			<p style="float: left;">Date .........</p>
		</div>
		<div class="col-md-6">
			<p style="float: right;">Signature .........</p>
		</div>
	</div>
	
</div>

<script>
  window.print();
</script>