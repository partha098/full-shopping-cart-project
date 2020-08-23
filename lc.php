<?php
session_start();
include("inc/db.php");

$user=$_POST['uname'];
$pass=$_POST['pass'];

$sel="SELECT * FROM customer WHERE (email='$user' OR phone='$user') AND password='$pass'";

$rs=$con->query($sel);

if($rs->num_rows>0){

  while($row=$rs->fetch_assoc()){
    $_SESSION['cid']=$row['id'];
    $_SESSION['name']=$row['name'];

    header("location:index.php");
  }

}
else{

  ?>
  <script>
  	alert("Invalid login");
  	window.location='index.php';
  </script>

  <?php
}



?>
