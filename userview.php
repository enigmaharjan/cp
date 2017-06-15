<?php session_start();
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
	if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){?><!DOCTYPE html>
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
   <?php
    	include_once("relatedphp/headernav.php");
		include_once("relatedphp/connect.php"); 
		?>

<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome to Shanti Store</h1>
</div>
<div class="row">
<div class="col-m-4">
 <?php include_once("relatedphp/adminmenu.php"); ?>
</div>
<div class="col-sm-4">
 <?php 
 $sql="select * from tbl_user";
 $result=$conn->query($sql);
?><table border="2px"><?php
				echo '<tr><td colspan=8 align="center">Registered Profiles</td></tr>';
				echo '<tr><th>First Name</td>';
				echo '<th>Last Name</th>';
				echo '<th>Address</th>';	
				echo '<th>Contact</th>';	
				echo '<th>Email</th>';
				echo '<th>Password</th>';
				echo '<th>Edit</th>';
				echo '<th>Delete</th></tr>';
while ($rs = mysqli_fetch_array($result))
{
                echo '<tr><td>'.$rs['first_name'].'<br>';	
				echo '</td><td>'.$rs['last_name'].'<br>';
				echo '</td><td>'.$rs['address'];
				echo '</td><td>'.$rs['contact'];
				echo '</td><td>'. $rs['email'];
				echo '</td><td>'. $rs['password'];
				echo '</td><td><a href="userview.php?id='.$rs['user_id'].'">Edit</a></td>';
				echo '</td><td><a href="userview.php?did='.$rs['user_id'].'">Delete</a></td></tr><br>';
				}
				?>
</table></div>
</div><?php
include_once 'relatedphp/form.php';
include_once("relatedphp/connect.php");}
else{
	header('location:profile.php');
}

?>
</div>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>