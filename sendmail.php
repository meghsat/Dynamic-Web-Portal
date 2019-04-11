<?php
session_start();

$rec=$_SESSION['email'];
$a= mail($rec,'steps to Reset your password',' http://localhost/registrationform(project1)/newpassword.php ','From: dmsss6174@gmail.com');

?>