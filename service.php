<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login.php');
}


?><!DOCTYPE html>
<html
<head>
<meta charset=utf-8 />
<meta name="description" content="description">
 
<title> Lucy's Pet Service</title>
 
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>
 <link rel="stylesheet" type="text/css" media="screen" href="css/div.css"/>
 <link href="css/formmcss.css" rel="stylesheet" type="text/css">

 

</head>
 
<body>

	<div id="logo"></div>
    <div id="signin"><a href="relatedphp/logout.php">Log out</a></div>
	<div id="contain"  style="width:">
    
	    <header>
		   <?php include_once 'relatedphp/headnav.php'; ?>
	    </header>
	    <?php include_once "relatedphp/photobanner.php";?>		<?php 
			$_SESSION['ufname'];
			$a=$_SESSION['uid'];
			include_once 'relatedphp/connect.php';
			include 'relatedphp/usermenu.php';
		?>
		</div>
        <?php
		$sql = "select * from booking where user_id=" . $_SESSION["uid"];
		$r = $conn->query($sql);
		$rs = $conn->query($sql);		
		
		?>
        <?php
		if(isset($_GET['aid']))
		{ 
		include 'relatedphp/bookingform.php';
		}
		?>
        
        <div id="banner" align="center"  style="font-weight:bold; font-size:36px; color:#EEEEEE ">You Request, We Deliver</div>
        <div id="content1" style="width:auto" >
		       <?php 
			   $week="select * from booking where id=".$_SESSION['uid'];
			   $weeks=$conn->query($week);
			   ?><a href="weekview.php?wid=<?php echo $_SESSION["uid"]; ?>">Week View</a>
        <table border="1px"><?php ?>
       <?php
		if(($ra = mysqli_fetch_array($rs))>0){
		echo '<tr><td colspan=7 align="center">My Booked Service</td></tr>';
		echo '<tr><th>Pet Name</td>';
		echo '<th>Service Name</th>';
		echo '<th>Days</th>';
		echo '<th>Session</th>';
		echo '<th>Time</th>';
		echo "<th>Update</th><th>Delete</th></tr>"; 
		while ($rs = mysqli_fetch_array($r))
		{
			$_SESSION['serviceid']=$rs["id"];
			
			$petname='select * from pet_tbl where id=' . $rs['pet_id'];
		$servicename='select * from services_tbl where id=' . $rs['service_id'];
		$pn=$conn->query($petname);
		$sn=$conn->query($servicename);
		$petobt = mysqli_fetch_array($pn);
		$serviceobt = mysqli_fetch_array($sn);
		$pname=$petobt['name'];
		$sname=$serviceobt['service_name'];
			
		echo '<tr><td>'. $pname. "</td><td>".$sname. "</td><td>".$rs['day']. "</td><td>".$rs['session']. "</td><td>".$rs['time'];
		?></td><td><a href="service.php?id=<?php echo $_SESSION["serviceid"]; ?>">Update</a></td>
        <td><a href="service.php?did=<?php echo $_SESSION["serviceid"]; ?>">Delete</a></td></tr><br>
		<?php continue;
		}?>
        <tr><td colspan="7" align="center"><a href="service.php?aid=<?php echo $_SESSION["serviceid"]; ?>">Add Service</a></td></tr></table> 
        <?php
include 'relatedphp/serviceupdate.php';
include 'relatedphp/servicedelete.php';
}
		else{
		?>
        <b><div align="center" style="color: rgba(0,153,204,1)">Book Our Service</b></div>
        <?php
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	include 'relatedphp/bookingform.php';
	?><br/>
    
<?php 
}
else
{
	
	$pid = $_POST['pet'];
		$sid = $_POST['service'];
		$day = $_POST['day'];
		$time = $_POST['time'];
		$uid = $_SESSION['uid'];
		$seid = $_POST['session'];
		
$sql = "INSERT INTO booking VALUES('','$uid','$pid','$sid','$day','$seid','$time')";
	
if($conn->query($sql)===true){
	echo "Service Added Successfully!";
}
else
{echo "aError! ".$conn->error;}
	

}}
?>
		</div>
	  
	</div>
 <?php include_once 'relatedphp/footer.php'; ?>
</body>
</html>