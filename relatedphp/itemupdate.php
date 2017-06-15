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
include 'relatedphp/connect.php';
if(isset($_GET['id'])){
if(!isset($_GET['aid']) || !isset($_GET['did'])){
$pid=$_GET['id'];
$sqlp= "SELECT * FROM products WHERE productid= '$pid'";
$resultp= $conn->query($sqlp);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$i= $valuep['productid'];
		$pn = $valuep['productname'];
		$ag = $valuep['rate'];
		$pt = $valuep['categoryid'];
    }}}
	if(isset($_GET['id'])){
	?>
<h1>Edit Item Information</h1>
<table>
<form method="post" action=''>
<tr><td>Item Name:</td><td> <input type = "text" name='itemname' value=' <?php echo $pn;  ?>' /></td></tr>
<tr><td>Rate:</td><td> <input type = "text" name='rate' value=' <?php echo $ag; ?>' /></td></tr>
<tr><td rowspan="3">Product Type:</td><td> <input type="radio" required="required" name='pt' value=1  />Rice</td></tr>
</td><td> <input type="radio" name='pt' value=2  required="required"/>Pulses</td></tr>
</td><td> <input type="radio" name='pt' value=3  required="required"/>Cylinder</td></tr>
<input type="hidden" name='pid' value='<?php echo $i; ?>'><tr><td align="center" colspan="2"><?php if(isset($_GET['id'])){?><input type= "submit" class="btn" name="update" value="Update" /></td></tr><?php } ?>
</form>
</table>
<?php
	}
if(isset($_POST['update'])){
	$pn = $_POST['itemname'];
		$ag = $_POST['rate'];
		$pi=$_POST['pid'];
		$pt=$_POST['pt'];
	$sqlu= "UPDATE products SET productname='$pn',rate='$ag',categoryid='$pt' where productid='$pi'";
	if($conn->query($sqlu)===true){?>
        
			<script language="javascript">
			alert('Item Updated');
			window.location = "items.php";
			</script>
		<?php
}
else
{
	echo "Error! ".$conn->error;
}
}}}
?>


</body>
</html>