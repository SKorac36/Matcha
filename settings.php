<?php
    require_once('header.php');
    if (isset($_SESSION) && !empty($_SESSION['uid']))
    {      
        $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$_SESSION['uid']]);
        $profile = $sql->fetch();
        if (!$sql)
        echo "<script type='text/javascript'>
            window.location.href = 'user_setup.php'; 
        </script>";
        if (isset($_POST['submit']))
        {
            $gender = $_POST['Gender'];
            $pref = $_POST['Pref'];
            $bio = $_POST['bio'];
            $age = 2019 - (int)$_POST['year'];
            $query = "UPDATE Matcha.Profiles SET Gender=?, Preference=?, Age=?, Bio=?, Tags=? WHERE id=?";
            $sql = $conn->prepare($query);
            $sql->execute([$gender, $pref, $age,$bio, $tags, $_SESSION['uid']]);
            alert("Successfully updated profile", "profile.php?id=".$_SESSION['uid']);
        }
    }
    else    
        header("location: " . "create_account.php");
?>
<html>

<head>
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<div id="main">
        <form class= "form" method="post" action="settings.php" align="center">
        <div class="reg_input">Year of birth<input type="date" name="year"></div><br>
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <select name="Pref">
            <option value="Straight">Straight</option>
            <option value="Gay">Gay</option>
            <option value="Bisexual">Bisexual</option>
        </select><br>
        <textarea name="bio">Enter your bio</textarea><br>
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
        </div>
<?php
    include('footer.php');
?>
</html>