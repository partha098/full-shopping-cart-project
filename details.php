<?php
session_start();
include("inc/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="css/main.css">
</head>

<style >
  .rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}
.rtn{
  float: left;
  width: 100%;
}
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

.checked{
  color: orange;
}

</style>


<body>
	<div class="container">
      
      <header class="row">
      	<figure class="col-md-12">
      		<img src="images/banner.jpg" class="banner">
      		
      	</figure>
      	<navbar class="col-md-12">
<?php include("inc/menu.php"); ?>
      	</navbar>
      	
      </header>


 
 <div class="row pw">
  <div class="col-md-6">
    <?php
    $pid=$_GET['id'];
      $sel="SELECT * FROM product where id='$pid'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){
      ?>
      <article class="col-md-12">
        <div class="card" >
  <img class="card-img-top" src="product_img/<?php echo $row['pimg']; ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['pname']; ?></h4>
    <p class="card-text">Rs: <?php echo $row['pprice']; ?></p>
    <?php 
      if(isset($_SESSION['cid']))
       {
  
      ?>
   <form action="ins-cart.php" method="post">
     <p><input type="number" name="qty" value="1" min="1" style="width: 60px;"></p>
     <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="price" value="<?php echo $row['pprice']; ?>">
     <input type="submit" name="act" value="Add to Cart" class="btn btn-primary">
   </form>
 <?php  } else {?>
 <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logi">Login to Buy</a>
  <?php
 }
  ?>


  </div>
</div>
        
      </article>
       <?php
       }
      ?>
    
  </div>

  <div class="col-md-6" >

    <?php
    $pid=$_GET['id'];
      $sel="SELECT * FROM ratting where pid='$pid' AND isapproved='1'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){
      ?>
      <div class="row">
        <div class="col-md-12">
           <h4><?php echo $row['name']; ?></h4>
          <p>
          <?php for($i=1;$i<=$row['ratting'];$i++){ ?>
          <span class="fa fa-star checked"></span>
        <?php  }?>

        <?php for($j=1;$j<=5-$row['ratting'];$j++) {?>
       <span class="fa fa-star "></span>
        <?php  } ?>
      </p>

      <p><?php echo $row['review'] ?></p>
      <hr/>
        </div>
      </div>

    <?php  } ?>
    

<form action="ins-ratting.php" method="post">
  <input type="hidden" name="pid" value="<?php echo $pid;?>">
  <p>Name</p>
  <p><input type="text" name="name" class="form-control"></p>
  <p>Phone</p>
  <p><input type="text" name="phone" class="form-control"></p>
  <p>Ratting</p>
  <div class="rtn">
  <fieldset class="rating">
   
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>
</div>

<p>Review</p>
<p><textarea class="form-control" name="rv"></textarea></p>
<p><input type="submit" name="savert" value="Feedback" class="btn btn-primary"></p>
  
</form>







  </div>



 	
 </div>

 <footer class="row">
 	<div class="col-md-12">
 		<p class="ft">&copy; @ All Right Resarved 2020</p>
 		
 	</div>
 	
 </footer>


	</div>

<div class="modal" id="logi">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="lc.php" method="post">
        
          
          <p>Phone or Email</p>
          <p><input type="text" name="uname" class="form-control"></p>
          <p>Password</p>
          <p><input type="password" name="pass" class="form-control"></p>
          <p><input type="submit" name="save" value="Sign In" class="btn btn-primary"></p>
       </form>
      </div>

      
    </div>
  </div>
</div>

<div class="modal" id="signu">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sign UP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="reg.php" method="post" onsubmit="return vali();">
         <p>Name<p>
          <p><input type="text" name="name" class="form-control"></p>
          <p>Email</p>
          <p><input type="email" name="email" class="form-control"></p>
          <p>Phone</p>
          <p><input type="text" name="phone" class="form-control"></p>
          <p>Password</p>
          <p><input type="password" name="pass" id="pass" class="form-control"></p>
          <p>Confirm Password</p>
          <p><input type="password" name="cpass" id="cpass" class="form-control"></p>
          <p><input type="submit" name="save" value="Sign Up" class="btn btn-success"></p>
       </form>
      </div>

      
    </div>
  </div>
</div>
<script >

  function updcart(id){

  $.ajax({
    url:'updqty.php',
    type:'POST',
    data:$("#frm"+id).serialize(),
    success:function(res){

      $("#crt_table").html(res);

    }


  });

  }


  function vali(){
    var pass=document.getElementById("pass").value;
    var cpass=document.getElementById("cpass").value;
    if(pass!=cpass){
      alert("password mismatch");
      return false;
    }
  }
</script>
</body>
</html>