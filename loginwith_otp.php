<?php include('server2.php')?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style_new3.css">
</head>
<body style="padding:0px;background: url(186462.jpg);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">
  <div class="header">
  	<h2>please enter the OTP</h2>
  </div>
	 
  <form method="post" action="loginwith_otp.php">
  	<?php include('errors.php'); ?>
   <form method="post" action="enternumber_forOTP.php">
    <?php include('errors.php'); ?>
     <div class="input-group">
      <label>phonenumber</label>
      <input type="phonenumber" name="phonenumber" pattern="(?=.*\d).{10}" title="should contain only 10 digits" value="<?php echo $phonenumber; ?>">
    </div>
    <div class="input-group">
      <img src='captcha.php'>
      <label>i am not a bot!!</label>
      <input type="text" name="cap">
    </div>
    <div class="input-group">
      <label>pleas enter the OTP</label>
      <input type="text" name="otp2">
    </div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="loginwith_otp">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
    <p>
      missed the OTP? <a href="enternumber_forOTP.php">Resend OTP</a>
    </p>

  </form>
</body>
</html>