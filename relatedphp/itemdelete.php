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
<?php
include 'connect.php';

if(isset($_GET['did'])){
$pid=$_GET['did'];
$delete= "DELETE FROM products WHERE productid = $pid";
if($conn->query($delete))
{?>
        
			<script language="javascript">
			alert('Item Deleted');
			window.location = "items.php";
			</script>
		<?php
}
else{
	echo "Item not deleted";
	
}}}
?>
</body>
</html>