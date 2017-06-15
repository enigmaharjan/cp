<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
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
   <?php  include_once("relatedphp/headernav.php"); ?>
<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome, <?php echo $_SESSION['ufname']; ?></h1>
</div>
<?php 
			$a=$_SESSION['uid'];
			include_once'relatedphp/connect.php';
			?>
        <div class="col-m-4">
        <?php if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
			include 'relatedphp/adminmenu.php';
				}
			else{
			include 'relatedphp/usermenu.php'; }
			 if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
			$sql="select * from tbl_confirm ";}
			else{$sql="select * from tbl_confirm where user_id=". $a;}
			$noitem=$conn->query($sql);
			if(($rs = mysqli_fetch_array($noitem))>0){
				$itemsview= $conn->query($sql); ?></div><table border="2px"><?php
				echo '<tr><td colspan=8 align="center"><b>Ordered List</b></td></tr>';
				echo '<tr><th>Product Name</td>';
				echo '<th>Quantity</th>';
				echo '<th>Total</th>';	
				echo '<th>Date</th>';	
				echo '<th>Delivery</th>';
				 if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
					 echo '<th>Update</th>';
					 echo '<th>Delete</th>';
					 echo '<th>User Email</th></tr>';
					 }
				
				while ($items = mysqli_fetch_array($itemsview)){
				echo '<tr><td>'.$items['productname'].'<br>';	
				echo '</td><td>'.$items['quantity'].'<br>';
				echo '</td><td>'.$items['total_price'];
				echo '</td><td>'.$items['order_date'];
				echo '</td><td>'. $items['delivery'];
				$sql='select * from tbl_user where user_id='.$items['user_id'];
				$res=$conn->query($sql);
				while($user=mysqli_fetch_array($res)){
				$email=$user['email'];}
				if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
					echo '<th><a href="orderlist.php?c_id='.$items['c_id'].'">Update</a></th>';
					echo '<th><a href="orderlist.php?c_did='.$items['c_id'].'">Delete</a></th>';
					echo '<td>'.$email.'</td></tr>';
					}?></td></tr><br>
		<?php			
				}
				echo'</table>';
				include 'relatedphp/serviceupdate.php';
				include 'relatedphp/servicedelete.php';	
				include 'relatedphp/confirm.php';	
				}
			else{
		?> 
			<script language="javascript">
			alert('You have no items in your cart.');
			window.location = "index.php";
			</script>
			<?php
            }
		?>
</div>
<?php
}
?>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>