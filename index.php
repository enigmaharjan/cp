<?php session_start();?>
<!DOCTYPE html>
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
   <?php include_once("relatedphp/headernav.php");
  
if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
				?><div class="container">
				<div class="jumbotron text-center" >
				<h1>Welcome to Admin Page</h1>
				</div>
                <div class="row">
				<div class="col-m-4">
				<?php 
				include_once("relatedphp/adminmenu.php");
			?></div></div></div>
			<?php }
		else{?>
<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome to Shanti Store</h1>
</div>

<div class="row">
<div class="col-sm-4">
<a href="#" class="thumbnail">
<img src="img/rice.jpg" alt="rice"></a>
<h3>Rice</h3>
<p>We have got different brands of rice.
<ul>Apple</ul>
<ul>Urza</ul>
<ul>Hulas</ul>
</p>
<a href="index.php?categoryid=1"><button type="button" class="btn btn-danger">Get Item</button></a>
</div>
<div class=" col-sm-4">
<a href="#" class="thumbnail">
<img src="img/pulses1.jpg" alt="rice"></a>
<h3>Pulses</h3>
<p>We have got variety of pulses</p>
<a href="index.php?categoryid=2"><button type="button" class="btn btn-danger">Get Item</button></a>
</div>
<div class=" col-sm-4">
<a href="#" class="thumbnail">
<img src="img/gas1.jpg" alt="rice"></a>
<h3>Gas</h3>
<p>We have got single brand of gas i.e. Sai baba gas</p>
<a href="index.php?categoryid=3"><button type="button" class="btn btn-danger">Get Item</button></a>
</div>
</div>
<hr />
<?php
include_once('showproduct.php');
include_once("relatedphp/connect.php");}
?>
</div>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>