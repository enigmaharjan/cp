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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   <?php include_once("relatedphp/headernav.php"); ?>
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
   }
   else{?>
<div class="container">
<div class="jumbotron text-center" >
<h1>We are always with you.</h1>
</div>
<div class="row">
<div class="col-md-4">
<?php 
   }
   ?>
</div>
<div class="col-md-4">
<p align="center" style=" font-weight:bold">We'd LOVE To Help</p>
        <table>
	    <p><tr><td><img src="img/location.png"/></td><td>    <u><strong>Satungal-7, Kathmandu</strong></u></td></tr>
        <tr><td><img src="img/calling.png"/></td><td>    <strong>9802979958, 9843696526 </strong></td></tr>
        <tr><td><img src="img/mail.png"/></td><td>    <strong>shivamaharjan1234567890@gmail.com</strong></td></tr>
        </table> 
</div>
<?php
include_once("relatedphp/connect.php");
	}
?>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>