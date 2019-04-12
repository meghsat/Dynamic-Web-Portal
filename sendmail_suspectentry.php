<?php
session_start();

$rec=$_SESSION['email'];
$a= mail($rec,'please confirm the link',' we have recieved multiple wrong password attempts, kindly please confirm whether its you - http://localhost/registrationform(project1)/.php ','From: dmsss6174@gmail.com');

?>