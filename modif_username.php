<?php
require_once('header.php');


if (isset($_POST['uname']))
    $uname = htmlentities($_POST['uname']);
if (isset($_POST['passwd']))
    $password = htmlentities($_POST['passwd']);
if (isset($_POST['uname2']))
    $uname2 = htmlentities($_POST['uname2']);
if (empty($uname) || empty($password) || empty($uname2))
{
     if (isset($_POST['submit']))
        alert_info("One of the fields has been left blank");
}
if (isset($_POST['submit']) && !empty($uname) && !empty($password) && !empty($uname2))
{
    $unique = check_unique($uname, $conn);
    if (check_unique($uname2, $conn) != "OK")
    {
        alert_info("Username already taken!");
        header('Location:modif_username.php');
        die();
    }
    if ($unique != "OK")
    {
        if (check_passwd($uname, $password, $conn) == "OK")
        {
            $replace = $conn->prepare("UPDATE Matcha.Users SET username=:uname2 WHERE username=:uname");
            $replace->execute(['uname2'=> $uname2,'uname'=> $uname]);
            $_SESSION['name'] = $uname2;
            alert("Username succesfully changed", $index);
           
        }
        else
            alert_info("Password incorrect");
    }
    else
         alert_info("Username not found!");
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
        <div class="reg_input">Enter username: <input type="text" name="uname"/><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd" /><br/></div>
        <div class="reg_input">Enter new username: <input type="text" name="uname2" /><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        <a href="settings.php" style="float:right" class="btn">Cancel</a>   
       <br/>        
       </form> 
       <?php
    include('footer.php');
?>