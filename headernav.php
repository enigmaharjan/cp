<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Shanti Store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <?php if(!isset($_SESSION['uid'])){
			?><li><a href="registration2.php">Register</a></li>
			<?php
				}
				else{?>
                 <li><a href="profile.php">My Profile</a></li><?php }?>
        <li><a href="cart.php">My Cart</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><?php if(isset($_SESSION['uemail'])){
		 
	 if($_SESSION['uemail']=='shivamaharjan1234567890@gmail.com'){?><a href="help2.docx"><?php }} else { ?><a href="help2.docx"><?php } ?>Help</a></li>
        <?php if(!isset($_SESSION['uid'])){
			?> <li><a href="login2.php">Login</a></li> <?php
				}
				else{?>
                 <li><a href="relatedphp/logout.php">LogOut</a></li><?php }?>
        
		
		
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>