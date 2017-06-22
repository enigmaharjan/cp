<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){


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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   <?php include_once("relatedphp/headernav.php"); ?>

<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome to Shanti Store</h1>
</div>
<?php 
			$_SESSION['ufname'];
			$a=$_SESSION['uid'];
			include_once 'relatedphp/connect.php';
			?>
            <div class="row">
			<div class="col-m-4">
			<?php
			include 'relatedphp/adminmenu.php';
		?>
		</div>
<div class="col-sm-4">
        <?php
		$sql = "select * from products";
		$r = $conn->query($sql);
		$rs = $conn->query($sql);
		?>	        
        <table border="1px">
       <?php
		if(($ra = mysqli_fetch_array($rs))>0){
		echo '<tr><th colspan=4 align="center"><b>Available Items</b></th></tr>';
		echo "<tr><th>Item Name</th> <th>Rate</th><th>Update</th><th>Delete</th></tr>"; 
		while ($ras = mysqli_fetch_array($r))
		{
			$_SESSION['pid']=$ras["productid"];
		echo '<tr><td>'. $ras["productname"]. "</td>";
		echo '<td>' . $ras['rate']?></td><td><a href="items.php?id=<?php echo $_SESSION["pid"]; ?>">Update</a></td>
        <td><a href="items.php?did=<?php echo $_SESSION["pid"]; ?>">Delete</a></td></tr><br>
		<?php
		}?>
        <tr><td colspan="4" align="center"><a href="items.php?aid=<?php echo $_SESSION["uid"]; ?>">Add Item</a></td></tr></table> 
        <hr />
        <?php
include 'relatedphp/itemupdate.php';
include 'relatedphp/itemdelete.php';
if(isset($_GET['aid']))
		{ 
		include 'relatedphp/itemregister.php';
		}
}
		else{
		?>
        <b><div align="center" style="color: rgba(0,153,204,1)">Add New Items</b></div>
        <?php
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	?><br/><table>
<form method="post" action=''>
<tr><td>Item Name:</td><td> <input type = "text" name='itemname'   /></td></tr>
<tr><td>Rate:</td><td> <input type = "text" name='rate'   /></td></tr>
<tr><td rowspan="3">Product Type:</td><td> <input type="radio" name='pt' value=1 required />Rice</td></tr>
</td><td> <input type="radio" name='pt' value=2 required />Pulses</td></tr>
</td><td> <input type="radio" name='pt' value=3 required />Cylinder</td></tr>
<tr><td align="center"><input class="btn" type="submit" name="submit" value="Register" />
 </td><td><input class="btn" type="reset" name="reset" value="reset"  /></td></tr>
</form></table>

<?php 
}
else
{
	
	if(isset($_REQUEST["submit"])){
		$pname=$_REQUEST["itemname"];
		$page=$_REQUEST["rate"];
		$pt=$_REQUEST["pt"];
		}
		
		
include_once 'relatedphp/connect.php';	
$sql = "INSERT INTO products VALUES('','$pname','$page','$pt')";
if($conn->query($sql)===true){?>
        
			<script language="javascript">
			alert('New Item Added');
			window.location = "items.php";
			</script>
		<?php
}
else
{echo "Error! ".$conn->error;}
	

}}
?>
		</div>
	  
	</div>
</div>
<?php
include_once("relatedphp/connect.php");}
else{
	header('location:profile.php');}

?>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>