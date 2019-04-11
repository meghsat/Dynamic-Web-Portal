<?php 
  session_start(); 

  if (!isset($_SESSION['username']))
   {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) //if you selected logout button then this condition satisfies and destroys the session killing the session variables
   {
  	session_destroy(); //destroy the session
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome to meghsat</title>
	<link rel="stylesheet" type="text/css" href="style_new3.css">
</head>
<body style="background: url(nasa-53884-unsplash.jpg);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">

<div class="header">
	<h2>Welcome to KRAMAH</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?> <!-- displays the message that you have successfully logged in -->
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome MR.<strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>