<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
if($_SESSION['uemail']!='shivamaharjan1234567890@gmail.com'){
			include 'relatedphp/index.php';
				}
			
else{
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shanti Store</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   <?php 
   include_once("relatedphp/headernav.php");
   		
    ?>

<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome to Shanti Store</h1>
</div>
<div class="row">
<div class="col-m-4">
<?php
	include_once("relatedphp/connect.php");
	include 'relatedphp/adminmenu.php';
?>
</div>
<div class="col-m-4">
<table border="1px">
<tr><th  colspan="2" style=" text-align:center">Total Sales</th></tr>
<tr><th style=" text-align:center">Email</th><th>View Report</th></tr>
<?php
	$a=9;
	$sql="select * from tbl_user";
	$res=$conn->query($sql);
	while($user= mysqli_fetch_array($res)){
		echo '<tr><td>'.$userid=$user['email'].'</td><td style=" text-align:center"><a href=sales.php?id='.$user['user_id'].">View</a></td></tr>";	
	}	
	
?>
</table><br/></div><div class="row"><div class="col-m-4"></div><div class="col-m-4">
<?php   
if(isset($_GET['id'])){
		$pid=$_GET['id'];
		$sqlp= "SELECT * FROM tbl_report WHERE user_id= '$pid'";
		$resultp= $conn->query($sqlp);
		if($resultp->num_rows > 0){
				foreach($resultp as $valuep){
					$ui = $valuep['user_id'];
					$pi = $valuep['productname'];
					$si = $valuep['quantity'];
					$di = $valuep['total_price'];
					$sei = $valuep['order_date'];
					$sqlu="SELECT * FROM tbl_user WHERE user_id= '$ui'";
					$res=$conn->query($sql);
					while($user= mysqli_fetch_array($res)){
						$username= $user['email'];
					}
					?></div><table border="2px"><?php
				echo '<tr><td colspan=8 align="center"><b>Ordered List</b></td></tr>';
				echo '<tr><th>Product Name</td>';
				echo '<th>Quantity</th>';
				echo '<th>Total</th>';	
				echo '<th>Date</th></tr>';
				
				echo '<tr><td>'.$valuep['productname'].'<br>';	
				echo '</td><td>'.$valuep['quantity'].'<br>';
				echo '</td><td>'.$valuep['total_price'];
				echo '</td><td>'.$valuep['order_date'].'</td></tr>';
					 
	}} 
	else {
		?> 
			<script language="javascript">
			alert('This user has not ordered till date.');
			window.location = "sales.php";
			</script>
			<?php
		}}
?></table>
</div>
</div>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  <?php } ?>
</html>