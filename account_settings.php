<?php
    require_once('header.php');
    check_logged_in();
    check_profile($_SESSION['uid'], $conn);
?>
<html>
    <head>
    <title>Settings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel= "stylesheet" href="stylesheet.css">
    </head>
    <body>
        <form class= "form">
            <h3>What would you like to change?</h3> <br>
                <a href="modif_birth_name.php" class="w3-bar-item w3-button">Name and Surname</a> <br>
                <a href="modif_username.php" class="w3-bar-item w3-button">Username</a> <br>
                <a href="modif_password.php" class="w3-bar-item w3-button">Password</a> <br>
                <a href="modif_email.php" class="w3-bar-item w3-button">Email Address</a> <br>
                <br/>        
       </form>
        <?php
        include_once('footer.php');
        ?>
</body>