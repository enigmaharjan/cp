
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	?>
<form role='form' method="post">
	<div class="form-group">
    <div class="col-sm-9">
      <label for="email" >Email</label>
    </div></div>
  <div class="form-group">
    <div class="col-sm-8">
      <input type="email" name="username" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-9">
      <label for="password" >Password</label>
    </div></div>
  <div class="form-group">
    <div class="col-sm-8">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-9">
      <label for="inputForgetPassword3" ><a href='forgot.php'>Forgot Your Password?</a></label>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" name="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
<?php
}
else{
	
	include_once "connect.php";
	$un = $_REQUEST["username"];
	$pw = $_REQUEST["password"];
	$sql = 'select * from tbl_user where email="' . $un . '" and password="' . $pw . '"';
	$rs = $conn->query($sql);
	if ($rs->num_rows==1)
		{
			while($row = $rs->fetch_assoc()){		//associating with array
		$_SESSION['uid']=$row['user_id'];		//associating with table with header id
		$_SESSION['ufname']=$row['first_name'];		//associating with table with header name
		$_SESSION['uemail']=$row['email'];  //associating with table with header account
		$_SESSION['ulastname']=$row['last_name']; 
		$_SESSION['ucontact']=$row['contact']; 
		$_SESSION['uaddress']=$row['address']; 
		$_SESSION['upassword']=$row['password'];
		}
		
			if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){
				?>
			<script language="javascript">
			alert('Welcome Admin');
			window.location = "index.php";
			</script>
		<?php
			}
			if($_SESSION['uemail']!='shivamaharjan1234567890@gmail.com'){
				?>
			<script language="javascript">
			alert('Welcome User');
			window.location = "index.php";
			</script>
		<?php
			}}
		
		else{?>
        
			<script language="javascript">
			alert('Wrong Username Or Password');
			window.location = "login2.php";
			</script>
		<?php
			}
	
}
?>

