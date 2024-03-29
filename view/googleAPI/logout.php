<?php
//Include GP config file
include_once 'gpConfig.php';

//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userData']);
unset($_SESSION['userData']);
unset($_SESSION['userFName']);
unset($_SESSION['userLName']);
unset($_SESSION['userPicture']);
unset($_SESSION['userEmail']);


//Reset OAuth access token
$gClient->revokeToken();

//Destroy entire session

session_destroy();

//Redirect to homepage
header("Location:../../index.php");
?>