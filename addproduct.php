<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
	
			?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
}else{
	include_once('relatedphp/connect.php');
	$a = $_SESSION['uid']."<br>";
	$p = $_REQUEST["productid"].'<br/>';
	$q= $_REQUEST['quantity'].'<br/>';
	$sql = "select rate from products where productid=" . $_REQUEST["productid"];
	$r = $conn->query($sql);
	$rs = mysqli_fetch_array($r);
	$rt= $_REQUEST['quantity']*$rs['rate'];
	$sql = "INSERT INTO tbl_order VALUES('','$a','$p','$q',$rt, date('Y-m-d H:i:s') ,'Pending')";
	if($conn->query($sql)===true){?>
        
			<script language="javascript">
			alert('Item Added Successfully');
			window.location = "index.php";
			</script>
		<?php
}
else
{echo "Error! ".$conne->error;}
	

	}
?>
</body>
</html>