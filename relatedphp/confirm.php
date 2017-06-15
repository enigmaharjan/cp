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
<?php
include 'relatedphp/connect.php';

if(isset($_GET['cid'])){
$pid=$_GET['cid'];
$sqlp= "SELECT * FROM tbl_order WHERE order_id= '$pid'";
$resultp= $conn->query($sqlp);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$i =$_SESSION['pid']= $valuep['order_id'];
		$a = $valuep['user_id'];
		$pi = $valuep['pname_id'];
		$q = $valuep['quantity'];
		$rt = $valuep['total_price'];
		
				$pname= 'select * from products where productid=' . $valuep['pname_id'];
				$rs=$conn->query($pname);
				$prodname= mysqli_fetch_array($rs);
		
		
		$p= $prodname['productname'];
		$sql = "INSERT INTO tbl_confirm VALUES('','$a','$p','$q',$rt, date('Y-m-d H:i:s') ,'Pending')";
		$sql1 = "DELETE FROM tbl_order WHERE order_id = $pid";

	if($conn->query($sql)===true){
		if($conn->query($sql1)===true){?>
        
			<script language="javascript">
			alert('Item Ordered Successfully');
			window.location = "cart.php";
			</script>
		<?php	
		
			
	}}}}}
}
?>
</body>
</html>