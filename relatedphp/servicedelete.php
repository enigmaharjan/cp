<?php
if(!isset($_SESSION['uid'])){
	header('location:login.php');
}
else {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'relatedphp/connect.php';
// this block deletes order from tbl_confirm
if(!isset($_GET['c_did'])){
if(isset($_GET['did'])){
$pid=$_GET['did'];
$delete= "DELETE FROM tbl_order WHERE order_id = $pid";
if($conn->query($delete))
{
	?>
			<script language="javascript">
			alert('Item Deleted Successfully');
			window.location = "cart.php";
			</script>
		<?php 
		}
		
else{
	echo "Service not deleted";
	
}}}}
// this block deletes order from tbl_confirm
if(!isset($_GET['did'])){
if(isset($_GET['c_did'])){
$pid=$_GET['c_did'];
$delete= "DELETE FROM tbl_confirm  WHERE c_id = $pid";
if($conn->query($delete))
{
	if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
				?>
			<script language="javascript">
			alert('Order Deleted Successfully');
			window.location = "orderlist.php";
			</script>
		<?php
}
}
else{
	echo "Service not deleted";
	
}}}
?>
</body>
</html>