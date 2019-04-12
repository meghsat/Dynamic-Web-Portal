<?php include('server2.php') ?>
   
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style_new3.css"><!-- relates this code with external souce(style.css)-->
</head> 
<body style="background: url(wp4222815.jpg);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">
  <div class="header">
    <h2>suspect login entry</h2>
  </div>
  <form method="post" action="mail_suspectsent.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
        <p>
      a confirm link will be sent to this email
    </p>
    <div class="input-group">
      <button type="submit" class="btn" name="mailforsuspectaccess">submit</button>
    </div>
