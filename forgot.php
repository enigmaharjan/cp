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
   <?php include_once("relatedphp/headernav.php"); ?>

<div class="container">
<div class="jumbotron text-center" >
<h1>Welcome to Shanti Store</h1>
</div>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-lg-4  " >
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
      <h4>Please input your registered email and contact</h4>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="username" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputContact3" class="col-sm-2 control-label">Contact</label>
    <div class="col-sm-8">
      <input type="contact" name="contact" class="form-control" id="inputConrXR3" placeholder="Contact">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Request</button>
    </div>
  </div>
</form>
</div>
<?php
include_once("relatedphp/connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$un = $_REQUEST["username"];
	$pw = $_REQUEST["contact"];
	$sql = 'select * from tbl_user where email="' . $un . '" and contact="' . $pw . '"';
	$rs = $conn->query($sql);
	if ($rs->num_rows==1)
		{
			while($row = $rs->fetch_assoc()){ 
		$a=$row['password'];
		
			?>
			<script language="javascript">
			alert('Your password is "<?php echo $a; ?>"'); 
			window.location = "login2.php";
			</script>
		<?php
		}}
		else{
			?>
			<script language="javascript">
			alert('Error 404: Not Found'); 
			window.location = "forgot.php";
			</script>
		<?php
			}
		}
?></div></div>
<!--footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>