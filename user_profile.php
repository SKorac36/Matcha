<?php
    require_once('header.php');
    
    if (isset($_GET) && isset($_GET['id']))
        $id = (int)$_GET['id'];
    $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $search = $sql->fetch();
    // if ($search)
    // {
    //     alert_info("Need to redirect to profile settings page");
    //     die();
    // }
    $query = "INSERT INTO Matcha.Profiles(id,age,gender,preference, bio) VALUES(?,?,?,?,?)";   
    if (isset($_SESSION) && !empty($_SESSION['uid']))
    {
        if (isset($_POST['submit']))
        {
            $gender = $_POST['Gender'];
            $pref = $_POST['Pref'];
            $bio = $_POST['bio'];
            $year = 2018 - (int)$_POST['year'];
            $sql = $conn->prepare($query);
            $sql->execute([$_SESSION['uid'], $year, $gender, $pref, $bio]);
            alert_info("Profile succesfully updated");
        }
    }
    var_dump($_POST);
?>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <?php
        echo '<form class= "form" method="post" action="user_profile.php?id='.$id.'" align="center">'
        ?>
        <div class="reg_input">Year of birth<input type="text" name="year"/><br/>yyyy</div>
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <select name="Pref">
            <option value="Straight">Straight</option>
            <option value="Gay">Gay</option>
            <option value="Bisexual">Bisexual</option>
            <textarea name="bio"></textarea>
           <textarea name="tags">Enter tags that would describe you prefixed with a '#'</textarea>
         <button onclick="getLocation()">Allow your location?</button>
         <p id="demo"></p>


        <input type="submit" class="btn" name="submit" value="OK"/>
        </form><script>
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;
    }   
</script>
<?php
    include('footer.php');
?>
</html>