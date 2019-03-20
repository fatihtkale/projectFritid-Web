<?php
  include "steam/steamauth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>projectFritid - Rust server</title>

  <!-- Bootstrap core CSS -->
  <link href="lib/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">projectFritid</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-link">
            <?php
            if(!isset($_SESSION['steamid'])) {
              loginbutton(); //login button

            }else {
              include ('steam/userInfo.php'); //To access the $steamprofile array
              //Protected content

				    $usercheck_query = mysqli_query($dbCon, "SELECT steamid FROM steam WHERE steamid='".$steamprofile['steamid']."'");

				    if (mysqli_num_rows($usercheck_query) < 1) {
            
				    	$sql = "INSERT INTO steam(steamid, personaname, avatar) VALUES ('".$steamprofile['steamid']."','".$steamprofile['personaname']."','".$steamprofile['avatar']."')";
            
	            if (mysqli_query($dbCon, $sql)) 
	            {
	               //echo "New record created successfully";
	            } 
	            else 
	            {
	               echo "Error: " . $sql . "" . mysqli_error($dbCon);
	            }
				    }
              logoutbutton(); //Logout Button
            }     
          ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid contentHeader">
    <div class="container headerBackground">
      <h1 class="mt-5">projectFritid | A Rust server</h1>
      <p class="lead">REEEEEEEEEEEEEEEEEEEEEEEEEEEEEE</p>
      <p>Welcome to the website of projectFritid's Rust community, we welcome everyone.</p>
      <p>Why us?</p>
      <ul class="">
        <li>We make custom plugins for our server.</li>
        <li>We provide a server with a lot of features.</li>
        <li>We strife to be the best and number 1!</li>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <h2 class="text-center">Our server</h2>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
          <h3>Features:</h3>
          <p>Our features</p>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
          <h3>Server stats</h3>
          <p>Some stats</p>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
          <h3>Wipe info</h3>
          <p>Info about next wipe and such</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="container">

    </div>
  </div>

  <footer class="bd-footer">
    <div class="container-fluid">
      <ul class="bd-footer-links">
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facepunch</a></li>
        <li><a href="#">Steam group</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <p>Website created and developed by <a href="#">projectFritid</a> staff.</p>
      <p>&copy; projectFritid 2019</p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="lib/js/jquery.min.js"></script>
  <script src="lib/js/bootstrap.bundle.min.js"></script>
</body>

</html>
