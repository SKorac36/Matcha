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
  <div>
  <h1 id="matcha">Matcha</h1>
</div>
<?php
    if (isset($_SESSION['name']))
    {
      $name = $_SESSION['name'];
      $uid = $_SESSION['uid'];
      echo '<a href="profile.php?id='.$uid.'" class="w3-bar=item w3-button">'.$name.'</a>';
    }
?>

  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="upload_images.php" class="w3-bar-item w3-button">Upload Image</a>
  <a href="settings.php" class="w3-bar-item w3-button">Settings</a> 
  <a href="account_settings.php" class="w3-bar-item w3-button">Account Settings</a>
  <a href="search.php" class="w3-bar-item w3-button">Search</a>
  <a href="browse_profiles.php" class="w3-bar-item w3-button">Browse Profiles</a>
  <a href="consultations.php" class="w3-bar=item w3-button">Consultations</a>
 
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  </div>
</div>
</body>

</html>