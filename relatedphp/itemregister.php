<?php 
$a=$_SESSION['uid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'connect.php';


	if(isset($_GET['aid'])){
		$uid=$_GET['aid'];
	?>
<h1>Add Items</h1>
<table>
<form method="post" action=''>
<tr><td>Item Name:</td><td> <input type = "text" name='itemname'   /></td></tr>
<tr><td>Rate:</td><td> <input type = "text" name='rate'   /></td></tr>
<tr><td rowspan="3">Product Type:</td><td> <input type="radio" required="required" name='pt' value=1  />Rice</td></tr>
</td><td> <input type="radio" name='pt' value=2 required="required" />Pulses</td></tr>
</td><td> <input type="radio" name='pt' value=3 required="required" />Cylinder</td></tr>
<tr><td align="center" colspan="2"><input type= "submit" name="update" value='Add' /></td></tr>
</form>
</table>
<?php
	}
if(isset($_POST['update'])){
	$pn = $_POST['itemname'];
		$ag = $_POST['rate'];
		$pt = $_POST['pt'];
$sql = "INSERT INTO products VALUES('','$pn','$pt','$ag')";
if($conn->query($sql)===true){?>
        
			<script language="javascript">
			alert('New Item Added');
			window.location = "items.php";
			</script>
		<?php
}
else
{
	echo "Error! ".$conn->error;
	}
}
?>
</body>
</html>