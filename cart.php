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
    <link href="css/style.css" rel="stylesheet">

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
<?php include_once("relatedphp/photobanner.php"); ?>
<?php 
			$a=$_SESSION['uid'];
			include_once'relatedphp/connect.php';
			include 'relatedphp/usermenu.php'; ?>
        <div class="col-sm-4">
        <?php 
			$sql="select * from tbl_order where user_id=". $a;
			$noitem=$conn->query($sql);
			if(($rs = mysqli_fetch_array($noitem))>0){
				$itemsview= $conn->query($sql); ?><table border="2px"><?php
				echo '<tr><td colspan=8 align="center">My Cart</td></tr>';
				echo '<tr><th>Product Name</td>';
				echo '<th>Quantity</th>';
				echo '<th>Total</th>';	
				echo '<th>Date</th>';	
				echo '<th>Status</th>';
				echo "<th>Update</th><th>Delete</th>";
				echo "<th>Confirm</th></tr>"; 
				while ($items = mysqli_fetch_array($itemsview)){
				$pname= 'select * from products where productid=' . $items['pname_id'];
				$rs=$conn->query($pname);
				$prodname= mysqli_fetch_array($rs);
				echo '<tr><td>'.$prodname['productname'].'<br>';	
				echo '</td><td>'.$items['quantity'].'<br>';
				echo '</td><td>'.$items['total_price'];
				echo '</td><td>'.$items['order_date'];
				echo '</td><td>'. $items['status'];?></td><td><a href="cart.php?id=<?php echo $items["order_id"]; ?>">Update</a></td>
		        <td><a href="cart.php?did=<?php echo $items["order_id"];?>">Delete</a></td>
                <td><a href="cart.php?cid=<?php echo $items["order_id"];?>">Confirm</a></td></tr><br>
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