<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
.btn {
	border: 0;
	color: #EEE;
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
 if(!isset($_GET['did'])){
if(isset($_GET['id'])){
$uid=$_GET['id'];
$sqlp= "SELECT * FROM tbl_user WHERE user_id= '$uid'";
$resultp= $conn->query($sqlp);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$i = $valuep['user_id'];
		$fn = $valuep['first_name'];
		$ln = $valuep['last_name'];
			$e = $valuep['email'];
				$p = $valuep['password'];
				$ad=$valuep['address'];
				$c=$valuep['contact'];
    }}}
		
	if(isset($_GET['id'])){
	
	?>
    <hr /><hr />
<h1>Edit Profile</h1>
<table>
<form method="post" action='	' >
<tr><td>First Name:</td><td> <input type = "text" required="required" name='firstname' value='<?php echo $fn; ?>'  /></td></tr>
<tr><td>Last Name:</td><td> <input type = "text" required="required" name='lastname' value='<?php echo $ln; ?>'  /></td></tr>
<tr><td>Address: </td><td><input type = "text" required="required" name='address' value='<?php echo $ad; ?>'  /></td></tr>
<tr><td>Contact: </td><td><input type = "text" required="required" name='contact' value='<?php echo $c; ?>'  /></td></tr> 
<tr><td>Email:</td><td><?php if($e=='shivamaharjan1234567890@gmail.com'){echo "It can't be changed.";}
else{ ?><input type = "text" required="required" name='email' value='<?php echo $e; ?>' /><?php }?></td></tr> 
<tr><td>Password:</td><td><input type = "password" name='password' required="required" value='<?php echo $p; ?>'/></td></tr> 
<tr><td align="center" colspan="2"><?php if(isset($_GET['id'])){?><input type= "submit" class="btn" name="update" value="Update" /></td></tr><?php } ?>
</form>
</table>
<?php
	}
if(isset($_POST['update'])){
				$fn = $_POST['firstname'];
				$ln = $_POST['lastname'];
				$e = $_POST['email'];
				if($e==''){
					$e='shivamaharjan1234567890@gmail.com';}
				$p = $_POST['password'];
				$ad= $_POST['address'];
				$d= $_POST['distance'];
				$c= $_POST['contact'];
				$upid=$uid;
	$sqlu= "UPDATE tbl_user SET first_name='$fn',email='$e',password='$p',address='$ad',contact='$c',last_name='$ln' where user_id='$upid'";
	if($conn->query($sqlu)===true){
		if($e=='shivamaharjan1234567890@gmail.com'){
	?>
	<script language="javascript">
		alert('Admin Updated Sucessfully');
		window.location = "profile.php";
	</script>
	<?php
		}elseif($e!='shivamaharjan1234567890@gmail.com'){
			?>
	<script language="javascript">
		alert('User Updated Sucessfully');
		window.location = "profile.php";
	</script>
	<?php
		}}
		else
			{
				echo "Error! ".$conn->error;
			}
		}}
		
	//
    
    if(!isset($_GET['id'])){
if(isset($_GET['did'])){
$pid=$_GET['did'];
$check="select * from tbl_user where user_id =$pid";
$query=$conn->query($check);
if($query->num_rows > 0){
	foreach($query as $email){//$query['email'];
$uemail= $email['email'];}
// for handling admin deletion
	if($uemail=='shivamaharjan1234567890@gmail.com'){	
	?>
			<script language="javascript">
			alert('Cannot Delete Admin');
			window.location = "userview.php";
			</script>
		<?php break;}
//for handling user deletion if it is not admin
elseif($uemail!='shivamaharjan1234567890@gmail.com'){
	$delete= "DELETE FROM tbl_user WHERE user_id = $pid";
if($conn->query($delete))
{
	?>
			<script language="javascript">
			alert('User Deleted Successfully');
			window.location = "userview.php";
			</script>
		<?php 
		}}}
		
else{
	echo "Service not deleted";
	
}}}?>

</body>
</html>