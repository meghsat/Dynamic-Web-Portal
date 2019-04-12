
<?php
session_start(); // sessions are used to transfer a data that is used in a page to another page if required(data accessing across various webpages of an enire website)
//A session creates a file in a temporary directory on the server where registered session variables and their values are stored. This data will be available to all pages on the site during that visit.
//A PHP session is easily started by making a call to the session_start() function.This function first checks if a session is already started and if none is started then it starts one. 
$username = "";
$email    = "";
$phonenumber = "";
$address = "";
$errors = array(); 
$count=0;
$_SESSION['count'] = $count;
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');// localhost,my_user,my_password,my_db



//                     newpassword
if (isset($_POST['new_password']))
{
  date_default_timezone_set("Asia/Kolkata"); // set time_zone according to your location
$expire_date = "2019-04-12 10:34:00"; // time that you want the link to expire 
echo $now = date("2019-04-12 10:32:00"); // your current time.

if (strtotime($now)<strtotime($expire_date))
 {
   header('location: linkexpire.php'); 
    //echo " sorry Your link is expired";
}
else
{
   //echo " link is still alive";

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

   if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords arent matching");}

   $password = $password_1;//encrypt the password before saving in the database
 if (count($errors) == 0) {
   $query = "UPDATE users SET password='$password' WHERE email='$email' ";
    mysqli_query($db, $query);
      $_SESSION['username'] = $username; // creating a session variable to access it in other pages only if you started the session
    $_SESSION['success'] = "You are now logged in";// THIS SESSION TEXT IS USED IN THE INDEX.PHP WHERE IT DISPLAYS THAT YOU HAD SUCCCESSFULLY LOGGED IN


    //header('location: index.php'); //uncomment this section if you want the login page to be directly opening after registering is done

                             }
}
}
// REGISTER USER
if (isset($_POST['reg_user'])) //this reg_user is the name of the button so when ever a button is clicked this isset checks whether that button exists or not. 
//THE FOLLOWING HAPPENS WHEN THE BUTTON IN REGISTER.PHP IS PRESSED(REG_USER) 
{
  // mysqli_real_escape_string is used to extract the data into a new variable 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

 //checking whether fields are filled or not if empty fields then error generates. here array_push is an array used to store the errors generated 
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");}
	if (empty($phonenumber)) { array_push($errors, "phonenumber is required"); }
    if (empty($address)) { array_push($errors, "address is required"); }
  


  // first check the database to make sure a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";  //extracting data from data base "LIMIT 1" is used to set the number of records to be returned at a point of time

   $result = mysqli_query($db, $user_check_query);//when ever a successful extraction of data is done it will return the objects
  $user = mysqli_fetch_assoc($result); // all the above objects extracted will be fetched as rows
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,phonenumber,address) VALUES('$username', '$email', '$password','$phonenumber','$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username; // creating a session variable to access it in other pages only if you started the session
  	$_SESSION['success'] = "You are now logged in";// THIS SESSION TEXT IS USED IN THE INDEX.PHP WHERE IT DISPLAYS THAT YOU HAD SUCCCESSFULLY LOGGED IN
  	//header('location: index.php'); //uncomment this section if you want the login page to be directly opening after registering is done
    header('location: congratsnewregister.php');
  }
}


//                                 LOGIN


if (isset($_POST['login_user'])) // login_user is the button name in login.php, so whenever the login button is pressed this condition satisfies 
{
  //the following is done to check whether captcha is valid or not i am storing the session variable 'cap_code' which i got from captcha.php 
  $code= $_SESSION['cap_code']; 
  $usercaptcha= $_POST['cap'];// this is the captcha given by the user we need to compare this and the above captcha which i have done below
 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password); //here we need to encrypt the password entered in login page to compare it with the already encrypted password which is stored in database during registration

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'"; //here we are extracting the matching credentials if they both match then we can entry the user
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) // here after the extraction part if the user is already a member then we get only one row of data otherwise we get no rows of data which means the user is not a member
     {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";// THIS SESSION TEXT IS USED IN THE INDEX.PHP WHERE IT DISPLAYS THAT YOU HAD SUCCCESSFULLY LOGGED IN
         if($code == $usercaptcha)
         {
          header('location: index.php'); //getting into only if both captcha and credentials are correct
         }
         else
         {
          array_push($errors, "invalid captcha entered");
         }
      
    }
    else 
    {
      $SESSION['count']+=1;
      array_push($errors, "Wrong username/password combination");
      if($SESSION['count']>=1)
      {
        header('location:mail_suspectsent.php');
      }
    }
  }
}
  



//                    mailfornew password
if (isset($_POST['mailfornewpassword']))
{
$email = mysqli_real_escape_string($db, $_POST['email']);

if (empty($email)) { array_push($errors, "Email is required"); }

$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";  //extracting data from data base "LIMIT 1" is used to set the number of records to be returned at a point of time

   $result = mysqli_query($db, $user_check_query);//when ever a successful extraction of data is done it will return the objects
  $user = mysqli_fetch_assoc($result); // all the above objects extracted will be fetched as rows
   if (count($errors) == 0) {
if ($user['email'] === $email) 
{
     
$_SESSION['email'] = $email;
    header('location: sendmail.php'); 
    }
  
  else 
  {
   array_push($errors, "sorry no such email exits, please enter a valid one");
  }

}
}


//                    mailforsuspectaccess password
if (isset($_POST['mailforsuspectaccess']))
{
$email = mysqli_real_escape_string($db, $_POST['email']);

if (empty($email)) { array_push($errors, "Email is required"); }

$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";  //extracting data from data base "LIMIT 1" is used to set the number of records to be returned at a point of time

   $result = mysqli_query($db, $user_check_query);//when ever a successful extraction of data is done it will return the objects
  $user = mysqli_fetch_assoc($result); // all the above objects extracted will be fetched as rows
   if (count($errors) == 0) {
if ($user['email'] === $email) 
{
     
$_SESSION['email'] = $email;
    header('location: sendmail_suspectentry.php'); 
    }
  
  else 
  {
   array_push($errors, "sorry no such email exits, please enter a valid one");
  }

}
}
?>
