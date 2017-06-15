<?php
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
else {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
.btn {
	border: 0;
	color: #900;
	cursor: pointer;
	font-weight: bold;
	padding: 8px 16px;
	font-size: 12px;
	background-color: rgba(0,0,102,.5);
	border-radius: 10px;
}

</style>
<body>
<hr />
<?php
include 'relatedphp/connect.php';

if(isset($_GET['id'])||isset($_GET['c_id'])){
if(isset($_GET['id'])){$pid=$_GET['id'];
$sqlp= "SELECT * FROM tbl_order WHERE order_id= '$pid'";
$resultp= $conn->query($sqlp);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$i =$_SESSION['pid']= $valuep['order_id'];
		$ui = $valuep['user_id'];
		$pi = $valuep['pname_id'];
		$si = $valuep['quantity'];
		$di = $valuep['total_price'];
		$sei = $valuep['order_date'];
		$ti = $valuep['status'];
		
		$prodname='select * from products where productid=' . $pi;
		$pn=$conn->query($prodname);
		$prodobt = mysqli_fetch_array($pn);
		$pname = $prodobt['productname'];
		$prate =$prodobt['rate'];
			
			
    }}}
	//for confirmation of order
if(isset($_GET['c_id'])){
	$pid=$_GET['c_id'];
	$sqlp= "SELECT * FROM tbl_confirm WHERE c_id= '$pid'";
$resultp= $conn->query($sqlp);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$i =$_SESSION['pid']= $valuep['c_id'];
		$ui = $valuep['user_id'];
		$pname = $valuep['productname'];
		$si = $valuep['quantity'];
		$di = $valuep['total_price'];
		$sei = $valuep['order_date'];
		$ti = $valuep['delivery'];
	}}}}
	if(isset($_GET['id'])){
	//for editing information
	?>
<h1>Edit Cart Information</h1>
<table>
<form method="post" action=''>
<input type="hidden" value=' <?php echo $sei; ?>' name='' />
<tr><td>Product Name:</td><td> <?php echo $pname; ?></td></tr>
<input type="hidden" value=' <?php echo $sei; ?>' name='pname_id' />
<tr><td>Product Quantity:</td><td><input type='number' name='quantity' value='<?php echo $si; ?>'  /></td></tr>
<input type="hidden" value=' <?php echo $prate; ?>' name='total' />
<tr><td>Status:</td><td> <?php echo $ti;?></td></tr><input type="hidden" value=' <?php echo $ti; ?>' name='status' />
<tr><td align="center" colspan="2"><?php if(isset($_GET['id'])){?><input type= "submit" class="btn" name="update" value="Update" /></td></tr><?php }} ?>
</form>
</table>
<?php 
//for delivery of items
if(isset($_GET['c_id'])){ ?>
<h1>Edit Cart Information</h1>
<table>
<form method="post" action=''>
<input type="hidden" value=' <?php echo $sei; ?>' name='' />
<tr><td>Product Name:</td><td> <?php echo $pname; ?></td></tr>
<input type="hidden" value=' <?php echo $sei; ?>' name='pname_id' />
<tr><td>Product Quantity:</td><td><?php echo $si; ?></td></tr>
<input type="hidden" value=' <?php echo $prate; ?>' name='total' />
<tr><td>Status:</td><td><input type = "radio" name='status' required="required" value='Pending'/> Pending<br/><input type="radio" value='Delivered' required="required" name='status' /> Delivered<br/><input type="radio" value='Out of Stock' required="required" name='status' /> Out of Stock</td></tr>
<tr><td align="center" colspan="2"><?php if(isset($_GET['id'])||isset($_GET['c_id'])){?><input type= "submit" class="btn" name="update" value="Update" /></td></tr><?php }}?>
</form>
</table>
<?php
	
	//for update in cart
if(isset($_POST['update'])&&isset($_GET['id'])){
	$pname_id= $pi;
		$total_price= $_POST['total']*$_POST['quantity'];
		$quantity = $_POST['quantity'];
		$uid = $_SESSION['uid'];
		$status = $_POST['status'];
		
$sql = "update tbl_order set  user_id='$uid',pname_id='$pname_id',quantity='$quantity',total_price='$total_price',order_date=date('Y-m-d H:i:s'),status='$status' where order_id='$pid'";
	
if($conn->query($sql)===true){ ?>
	<script language="javascript">
			alert('You have updated your cart.');
			window.location = "cart.php";
			</script>
			<?php
}}

	
	//for update in confirm table
	if(!isset($_GET['id'])){
if(isset($_POST['update'])&&isset($_GET['c_id'])){
		$status = $_POST['status'];
		
$sql = "update tbl_confirm set  order_date=date('Y-m-d H:i:s'),delivery='$status' where c_id='$pid'";
	
if($conn->query($sql)===true){ ?>
	<script language="javascript">
			alert('Delivery Status has been changed.');
			window.location = "orderlist.php";
			</script>
			<?php
}
else
{echo "aError! ".$conn->error;}
	

}}}
?>


</body>
</html>