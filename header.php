<?php
 
 require_once('functions.php');
 require_once('./config/connect.php');
 require_once('email_functions.php');
session_start();
$index = "index.php";
?>
<!DOCTYPE html>
<html>
<title>Matcha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="stylesheet.css">
<body>
<div class="container-fluid w3-pink">
<?php
  if (isset($_SESSION))
    echo '<h1>Matcha</h1>';
?>
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="upload_images.php" class="w3-bar-item w3-button">Upload Image</a>
  <a href="settings.php" class="w3-bar-item w3-button">Settings</a> 
  <a href="account_settings.php" class="w3-bar-item w3-button">Account Settings</a>
  <a href="search.php" class="w3-bar-item w3-button">Search</a>
  <a href="browse_profiles.php" class="w3-bar-item w3-button">Browse Profiles</a>
  <a href="consultations.php" class="w3-bar=item w3-button">Consultations</a>
  <a href="create_account.php" class="w3-bar-item w3-button">Login/Register</a>
 
  <a href="logout.php" style= "float:right" class="w3-bar-item w3-button">Logout</a>
  <?php
      if(!isset($_SESSION) || empty($_SESSION['uid']))
        echo '<p style="float:right">Guest</p>';
      else if (isset($_SESSION['name']))
      {
        $name = $_SESSION['name'];
        $uid = $_SESSION['uid'];
        echo '<a href="profile.php?id='.$uid.'" style="float:right" class="btn">'.$name.'</a>';
      }
    ?>
  </div>
</div>
</body>

</html>