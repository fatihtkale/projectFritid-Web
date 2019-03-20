<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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
            <a class="nav-link" href="#">About</a>
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
</body>
</html>