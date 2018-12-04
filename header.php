<?php
 
 require_once('functions.php');
 require_once('./config/connect.php');
 require_once('email_functions.php');
// include_once('check_passwd.php');
// include_once('check_unique.php');
// require_once('password.php');
// require_once('send_email.php');
// require_once('config/connect.php');
session_start();
$index = "index.php";
?>
<!DOCTYPE html>
<html>
<title>Matcha</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <link rel="stylesheet" href="style.css"> -->
<body>
<div class="w3-container w3-pink">
<?php
  if (isset($_SESSION))
    echo '<h1><img src=logo.png height="100" width="100">Matcha</h1>';
?>
  <!-- <h1><img src=logo.png height="100" width="100">Matcha</h1>  -->
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
<a href="user_images.php?pg_num=1" class="w3-bar-item w3-button">Your images</a>
  <a href="photo.php" class="w3-bar-item w3-button">Upload Image</a>
  <a href="settings.php" class="w3-bar-item w3-button">Settings</a>
  <a href="create_account.php" class="w3-bar-item w3-button">Login/Register</a>
  <a href="logout.php" style= "float:right" class="w3-bar-item w3-button">Logout</a>
  <!-- <p style="float:right"> -->
    <?php
      if(!isset($_SESSION) || empty($_SESSION['uid']))
        echo "Guest";
      else if (isset($_SESSION['name']))
      {
        $name = $_SESSION['name'];
        $uid = $_SESSION['uid'];
        echo '<a href="user_profile.php?id='.$uid.'" style="float:right" class="btn">'.$name.'</a>';
      }
    ?>
  <!-- </p> -->
  </div>
</div>
</body>

</html>