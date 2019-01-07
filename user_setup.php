<?php
    require_once('header.php');
    
    $query = "INSERT INTO Matcha.Profiles(id,age,gender,preference,tags,latitude,longitude, bio) VALUES(?,?,?,?,?,?,?,?)";   
    if (isset($_SESSION) && !empty($_SESSION['uid']))
    {
        if (isset($_POST['submit']))
        {
            if ($_POST['bio'] == 'Enter a bio! Use hashtags freely!')
                alert("Come on enter a bio!", 'User_setup.php');
            $gender = $_POST['Gender'];
            $pref = $_POST['Pref'];
            $bio = $_POST['bio'];
            $tags = serialize(get_tags($bio));
            $time = getdate();
            $age = $time[year] - $_POST['year'];
            $sql = $conn->prepare($query);
            $sql->execute([$_SESSION['uid'], $age, $gender, $pref, $tags,$_POST['latitude'],$_POST['longitude'], $bio]);
            alert("Profile succesfully created, if you would like to change anything go to the settings bro", "index.php");
        }
    }
    else
        echo "You are not logged in";
?>
<html>
<head>
    <title>User Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

        <form class= "form" method="post" action="user_setup.php" align="center">
        <div class="reg_input">Year of birth<input type="date" name="year"></div>
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <select name="Pref">
            <option value="Straight">Straight</option>
            <option value="Gay">Gay</option>
            <option value="Bisexual">Bisexual</option>
            <option value="Asexual">Asexual</option>
        <?php
            echo '<textarea name="bio">Enter a bio! Use hashtags freely!</textarea>'
		?>
        <br>
        <div class="reg_input">Latitude<input id="lat" type="text" name="latitude"></div>
        <div class="reg_input">Longitude<input id="long" type="text" name="longitude"></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
        <div>
        <p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>
    <form class="form" id="upload" method="POST" action="upload_image.php" enctype="multipart/form-data">
         Upload your profile picture
        <input type="file" name="file" id="file"> <br>
        <input type="submit" value="Click to upload" name="submit">
    </form>
</div>
<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
	document.getElementById("lat").value = (position.coords.latitude);
	document.getElementById("long").value = (position.coords.longitude);
}
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}
</script>
<?php
    include('footer.php');
?>
</html>