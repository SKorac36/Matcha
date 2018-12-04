<?php
    require_once('header.php');
    if (isset($_POST['submit']))
    {
        $gender = $_POST['Gender'];
        $pref = $_POST['Pref'];
        $bio = $_POST['bio'];
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

        <form class= "form" method="post" action="user_profile.php" align="center">
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
        <textarea name="bio" ></textarea>
		 
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
<?php
    include('footer.php');
?>
</html>