<?php include('server2.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style_new3.css"><!-- relates this code with external souce(style.css)-->
</head> 
<body style="background: url(wp4222831.jpg);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">
  <div class="header">
    <h2>please enter your email</h2>
  </div>
<form method="post" action="mailfornewpassword.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
        <p>
      a link to reset your password will be sent to this mail
    </p>
    <div class="input-group">
      <button type="submit" class="btn" name="mailfornewpassword">submit</button>
    </div>
  <!-- <a href="http://goole.com"><button>Go to Google</button></a> -->
  
 