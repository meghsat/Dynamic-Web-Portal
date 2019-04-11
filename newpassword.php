<?php include('server2.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style_new3.css"><!-- relates this code with external souce(style.css)-->
</head> 
<body style="background: url(nasa-45068-unsplash.jpg);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">
  <div class="header">
    <h2>please enter your new password</h2>
  </div>
    
  <form method="post" action="newpassword.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="new_password">Reset password</button>
    </div>
  </form>
</body>
</html>

  
