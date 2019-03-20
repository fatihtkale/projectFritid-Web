<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbDatabase = "projectFritid_w";
$dbCon = mysqli_connect(
	$dbHost,
	$dbUser,
	$dbPassword,
	$dbDatabase);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
  	echo "Connection has been established.";
  	//Please remove this when website goes live!!! IMPORTANT ELSE PEOPLE CAN SEE OUR DATABASE NAME REEEEEEEEEEE
  }
?>