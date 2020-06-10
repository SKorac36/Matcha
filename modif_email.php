<?php
require_once('header.php');




if (isset($_POST['email']))
    $email = htmlentities($_POST['email']);
if (isset($_POST['passwd']))
    $password = htmlentities($_POST['passwd']);
if (empty($email) || empty($password))
{
     if (isset($_POST['submit']))
        alert_info("One of the fields has been left blank");
}
if (isset($_POST['submit']) && !empty($email) && !empty($password))
{
    if (check_passwd($_SESSION['name'], $password, $conn) == "OK")
        {
            $replace = $conn->prepare("UPDATE Matcha.Users SET email=:email WHERE username=:username");
            $replace->execute(['email'=> $email, 'username'=> $_SESSION['name']]);
            alert("Email successfully changed", $index);
           
        }
        else
            alert_info("Password incorrect");
}
?>
<html>
<head>
    <title>Change Username</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

        <form class= "form" method="post" action="modif_email.php">
        <div class="reg_input">Enter new email: <input type="email" name="email"/><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd" /><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        <a href="settings.php" style="float:right" class="btn">Cancel</a>   
       <br/>        
       </form> 