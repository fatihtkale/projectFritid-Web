<?php
  include "steam/steamauth.php";
?>
<!DOCTYPE html>
<html>
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">About
              <span class="sr-only">(current)</span>
            </a>
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

  <!-- Content !-->


  <!-- Bootstrap core JavaScript -->
  <script src="lib/js/jquery.min.js"></script>
  <script src="lib/js/bootstrap.bundle.min.js"></script>
</body>
</html>