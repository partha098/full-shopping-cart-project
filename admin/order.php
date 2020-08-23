<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header("location:index.php");
}
include("../inc/db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Products</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php  include("admin_inc/menu.php");?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php  include("admin_inc/top.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order</h1>

          <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Phone</th>
        <th>Total</th>

        <th>View Details</th>
         <th>Print</th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php
      $sel="SELECT * FROM morder";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){

      ?>


    
      <tr>
       
        <td>

        <div class="modal" id="myModal<?php echo $row['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <h2>Customer Details</h2>

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
          $total=$total+($rows['qty']*$rows['price']);

          $pid=$rows['pid'];

          $selp="SELECT * FROM product WHERE id='$pid'";
          $rsp=$con->query($selp);
          while($rowp=$rsp->fetch_assoc()){


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
    </tbody>
  </table>
       
           
      </div>

     
    </div>
  </div>
</div>
  
          <?php echo $row['bn']; ?></td>
         <td><?php echo $row['bp']; ?></td>
         <td><?php  echo $total; ?></td>

         <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">View More</button></td>
         <td><a target="_blank" href="bill.php?id=<?php  echo $row['id'];?>" class="btn btn-primary">Print</a></td>
          
       
       
       
      </tr>
      <?php
       }
      ?>
      
    </tbody>
  </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
