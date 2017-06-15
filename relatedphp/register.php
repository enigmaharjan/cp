 <?php
session_start();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
</head>
<body>

  <h1><strong>You Register. We Deliver.</strong></h1>
<?php
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	?><br/>
    <form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" name="fname" class="form-control" required="required" id="fname" placeholder="First Name">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" name="lname" class="form-control" required="required" id="lname" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label for="Address" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control" required="required" id="address" placeholder="Address">
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" required="required" id="phone" placeholder="Phone">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" required="required" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" required="required" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      	<button type="submit" name="submit" class="btn btn-default">Register</button>
    	<button type="reset" name="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
</form>

<?php
}
else
{
	
	if(isset($_REQUEST["submit"])){
		$fname=$_REQUEST["fname"];
		$lname=$_REQUEST["lname"];
		$address=$_REQUEST["address"];
		$email=$_REQUEST["email"];
		$phone=$_REQUEST["phone"];
		$password=$_REQUEST["password"];
		
		}
		
		
include_once 'connect.php';
$sql = "INSERT INTO tbl_user VALUES('','$fname','$lname','$address','$phone','$email','$password')";
$sqlu='select * from tbl_user where email="$email"';
$r = $conn->query($sqlu);
	
	if ($r->num_rows==0)
		{
if($conn->query($sql)){
	echo '<a href="login2.php"><input type="button" class="btn" value="Login Now"></a>';
	}
	else{
	echo 'Email Already Exists '. '<br/>';
	echo '<a href="registration2.php"><input type="button" class="btn" value="Go Back"></a>';
}}}
?>
</pre>
</body>
</html>