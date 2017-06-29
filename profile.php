<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
	else{

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
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   <?php include_once("relatedphp/headernav.php");
   if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
				?><div class="row"><div class="container">
				<div class="jumbotron text-center" >
				<h1>Welcome to Admin Page</h1>
				</div>
                <div class="row">
				<div class="col-m-4">
				<?php 
				include_once("relatedphp/adminmenu.php");
			?></div>
			<?php // 
			$_SESSION['ufname'];
			$a=$_SESSION['uid'];
			$_SESSION['uemail'];
			include_once 'relatedphp/connect.php'; ?>
        <div class="col-sm-4">
        <?php 
		$sql = "select * from tbl_user where user_id=" . $_SESSION['uid'];
		$r = $conn->query($sql);
		if($r === FALSE) { 
    		die(mysql_error()); // TODO: better error handling
		}
		while ($rs = mysqli_fetch_array($r))
		{?> 
        <div style="font-size:16px">
        <table bordercolor="#111111" border="2px">
		<?php
		echo "<tr><td>Name: </td><td>" .  $rs["first_name"].' ' . $rs["last_name"]. "</td></tr>";
		echo "<tr><td>Email: </td><td>" . $rs['email']. "</td></tr>";
		echo "<tr><td>Address: </td><td>" . $rs['address']. "</td></tr>";
		echo "<tr><td>Contact: </td><td>" . $rs['contact']. "</td></tr>";
		?></div></table>
        <br /><a href="profile.php?id=<?php echo $_SESSION["uid"]; ?>"><input type="button" class='btn' value="Update" /></a>
        <?php
		}
		include_once 'relatedphp/form.php';}
			
		elseif($_SESSION['uemail']!='shivamaharjan1234567890@gmail.com'){ ?>

<div class="container">
<?php include_once("relatedphp/photobanner.php"); ?>

<?php 
			$_SESSION['ufname'];
			$a=$_SESSION['uid'];
			$_SESSION['uemail'];
			include_once 'relatedphp/connect.php';
			include 'relatedphp/usermenu.php'; ?>
        <div class="col-sm-4">
        <?php 
		$sql = "select * from tbl_user where user_id=" . $_SESSION['uid'];
		$r = $conn->query($sql);
		if($r === FALSE) { 
    		die(mysql_error()); // TODO: better error handling
		}
		while ($rs = mysqli_fetch_array($r))
		{?> 
        <div style="font-size:16px">
        <table bordercolor="#111111" border="2px">
		<?php
		echo "<tr><td>Name: </td><td>" .  $rs["first_name"].' ' . $rs["last_name"]. "</td></tr>";
		echo "<tr><td>Email: </td><td>" . $rs['email']. "</td></tr>";
		echo "<tr><td>Address: </td><td>" . $rs['address']. "</td></tr>";
		echo "<tr><td>Contact: </td><td>" . $rs['contact']. "</td></tr>";
		?></div></table>
        <br /><a href="profile.php?id=<?php echo $_SESSION["uid"]; ?>"><input type="button" class='btn' value="Update" /></a>
        <?php
		}
		include_once 'relatedphp/form.php';
		?>
		</div>
	  
	</div>
</body>
<?php
}

?>
</div>
<?php
include_once("relatedphp/connect.php");}

?>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>