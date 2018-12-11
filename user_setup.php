<?php
    require_once('header.php');
    
    $query = "INSERT INTO Matcha.Profiles(id,age,gender,preference,tags, bio) VALUES(?,?,?,?,?,?)";   
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
            $age = 2018 - (int)$_POST['year'];
            $sql = $conn->prepare($query);
            $sql->execute([$_SESSION['uid'], $age, $gender, $pref, $tags, $bio]);
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
        <div class="reg_input">Year of birth<input type="text" name="year"></div>
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
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
<?php
    include('footer.php');
?>
</html>