<?php include('server2.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style_new3.css"><!-- relates this code with external souce(style.css)-->
</head> 
<body style="background: url(2.gif);background-repeat: no-repeat;background-size:cover;height: 100vh; width:100%;background-attachment: fixed;overflow-y: hidden">

  <div class="header">
    <h2>Register to meghsat</h2>
  </div>
    <!-- <div class="image">
        <img src="images.jpg"  height="500" width="500" align="left">
      </div>-->
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1" pattern="(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
      title="your password should be atleast 8 characters length with atleast one number,one uppercase, one lowercase letter,one special character"   >
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2" pattern="(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
       title="your password should be atleast 8 characters length with atleast one number,one uppercase, one lowercase letter,one special character">
    </div>
     <div class="input-group">
      <label>phonenumber</label>
      <input type="phonenumber" name="phonenumber" pattern="(?=.*\d).{10}" title="should contain only 10 digits"

 value="<?php echo $phonenumber; ?>">
    </div>
    <div class="input-group">
      <label>address</label>
      <input type="address" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>

  
