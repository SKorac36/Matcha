<?php
require_once('header.php');


if (isset($_POST['passwd']))
    $password = htmlentities($_POST['passwd']);
if (isset($_POST['uname']))
    $uname = htmlentities($_POST['uname']);
if (empty($uname) || empty($password))
{
     if (isset($_POST['submit']))
        alert_info("One of the fields has been left blank");
}
if (isset($_POST['submit']) && !empty($uname) && !empty($password))
{
    $unique = check_unique($uname, $conn);
    if ($unique == "OK")
    {
        if (check_passwd($_SESSION['name'], $password, $conn) == "OK")
        {   
            $replace = $conn->prepare("UPDATE Matcha.Users SET username=? WHERE id=?");
            $replace->execute([$uname, $_SESSION['uid']]);
            $_SESSION['name'] = $uname;
            alert("Username succesfully changed", $index); 
        }
        else
            alert_info("Password incorrect");
    }
    else
         alert_info("Sorry that username is already in use");
}
?>
<html>
<head>
    <title>Change Username</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

        <form class= "form" method="post" action="modif_username.php">
        <div class="reg_input">Enter new username: <input type="text" name="uname" /><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd" /><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        <a href="settings.php" style="float:right" class="btn">Cancel</a>   
       <br/>        
       </form> 
       <?php
    include('footer.php');
?>