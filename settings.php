<?php
require_once('header.php');

check_logged_in();  
check_profile($_SESSION['uid'], $conn);
$info = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=41.71.114.146'));
$latitude = (float)$info['geoplugin_latitude'];
$longitude = (float)$info['geoplugin_longitude'];
if (isset($_POST['submit']))
{
    if (!validateText($_POST['latitude']) || !validateText($_POST['longitude']))
        alert("Incorrect input for coordinates", "settings.php");
    if($_POST['latitude'] != "" || $_POST['longitude'] != ""){
         $latitude = round((float)$_POST['latitude'], 6);
         $longitude = round((float)$_POST['longitude'],6);
    }
if ($latitude > 90 || $latitude < -90 || $longitude > 180 || $longitude < -180) {
        $latitude = (float)$info['geoplugin_latitude'];
        $longitude = (float)$info['geoplugin_longitude'];
    }
    $_POST['latitude'] = $latitude;
    $_POST['longitude'] = $longitude;
    foreach ($_POST as $value){
        if ($value == ""){
            alert("One or more values left out, please try again.", 'settings.php');
        }
    }
    if (!$_POST['bio'] || $_POST['bio'] == "Enter a bio!")
        alert("Come on enter a bio!", 'settings.php');
    if (($_POST['array']) != "")
        $matches = get_tags($_POST['array']);
    else
        alert("You need at least one tag!", 'settings.php');
    $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $profile = $sql->fetch();
    if (!$profile)
        alert("You need to setup your account", "user_setup.php");
    $query = "UPDATE Matcha.Profiles SET age=?, gender=?, preference=?, tags=?, latitude=?, longitude=?, bio=? WHERE id=?";
    $gender = $_POST['Gender'];
    $pref = $_POST['Pref'];
    $bio = $_POST['bio'];
    $tags = serialize($matches);
    $time = getdate();
    $age = $time['year'] - (int)$_POST['year'];
    $sql = $conn->prepare($query);
    $sql->execute([$age, $gender, $pref, $tags, $latitude ,$longitude, $bio, $_SESSION['uid']]);
    alert("Profile successfully updated ", "index.php");
}
?>
<html>
<head>
    <title>User Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<div id="main">
<div align="center">
    <p>Click the button to get your coordinates.</p>

    <button onclick="getLocation()">Try It</button><br><br><br><br>
</div>
<div align="center">
    <p>Select one or more tags</p>
    <button onclick="addTags('musician')">Musician</button>
    <button onclick="addTags('gamer')">Gamer</button>
    <button onclick="addTags('coder')">Coder</button>
    <button onclick="addTags('cook')">Cook</button>
    <button onclick="addTags('nerd')">Nerd</button>
    <form class= "form" method="post" action="settings.php" align="center">
        <div class="reg_input">Date of birth<input type="date" name="year"></div><br>
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <select name="Pref">
            <option value="Straight">Straight</option>
            <option value="Gay">Gay</option>
            <option value="Bisexual">Bisexual</option>
            <textarea name="bio">Enter a bio!</textarea>

            <br>
            <div class="reg_input">Latitude<input id="lat" type="text" name="latitude"></div>
            <div class="reg_input">Longitude<input id="long" type="text" name="longitude"></div><br>
            <input type="submit" class="btn" name="submit" value="OK"/>
            <div hidden class="reg_input"><input id="array" type="text" name="array"></div>
    </form>
</div>
<script type="text/Javascript">
    function checkDec(el){
        var ex = /^[0-9]+\.?[0-9]*$/;
        if(ex.test(el.value)==false){
            el.value = el.value.substring(0,el.value.length - 1);
        }
    }</script>
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
    array = new Array();

    function addTags(tag){
        array.push(tag);
        showArray(array);
        return array;
    }
    function showArray(array)
    {
        array.toString();
        document.getElementById("array").value = array;
    }

</script>
</div>
<?php
include('footer.php');
?>
</html>