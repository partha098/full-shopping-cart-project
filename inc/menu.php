
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>

<?php  if(isset($_SESSION['cid'])){

     $cid=$_SESSION['cid'];
      $sel="SELECT * FROM cart WHERE cid='$cid'";
      $rs=$con->query($sel);
      

  ?>

      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link" href="#"  data-toggle="dropdown">Cart <span class="badge badge-pill badge-danger"><?php echo $rs->num_rows; ?></span></a>


        <div class="dropdown-menu">
          <table class="table table-striped">
      
    
    <tbody>
      <?php
      $st=0;
      $cid=$_SESSION['cid'];
      $sel="SELECT * FROM cart WHERE cid='$cid'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){

        $pid=$row['pid'];
         $selp="SELECT * FROM product WHERE id='$pid'";
      $rsp=$con->query($selp);
      while($rowp=$rsp->fetch_assoc()){

        $st=$st+($row['qty']*$row['price']);

      ?>
      <tr>
         <td><?php echo $rowp['pname']; ?></td>
        
          <td><img src="product_img/<?php echo $rowp['pimg']; ?>" style="width: 40px;"></td>
       


        <td>
          <?php echo $row['qty']; ?>

          </td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['qty']*$row['price']; ?></td>
      </tr>
      <?php
    }
       }
      ?>
      <tr>
        <th colspan="4" style="text-align: right;">Sub Total</th>
        <th><?php  echo $st;?> </th>
      </tr>
      <tr>
        <td colspan="5" style="text-align: right;">
          <a href="cart.php" class="btn btn-success">View Cart</a>
          
        </td>
      </tr>
      
    </tbody>
  </table>

       </div>

      </div>
      </li>
    <?php  } ?>

      
 
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php 
      if(!isset($_SESSION['cid']))
       {
  
      ?>

      <li class="nav-item">
        <a class="btn btn-primary gap" href="#" data-toggle="modal" data-target="#logi">Login</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#signu">Sign Up</a>
      </li>
    <?php  } else{ ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['name'];?></a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
  </li>

    <?php }  ?>
     
    </ul>
  </div>
</nav>