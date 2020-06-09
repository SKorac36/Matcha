<?php
require_once("header.php");


if (isset($_POST['passwd']))
    $passwd     =     htmlentities($_POST['passwd']);
if (isset($_POST['newpasswd']))
    $newpasswd  =     htmlentities($_POST['newpasswd']);
if (isset($_POST['connewpasswd']))
    $newpasswd2 =     htmlentities($_POST['connewpasswd']);
if (!empty($passwd) && !empty($newpasswd) && !empty($newpasswd2) && isset($_POST['submit']))
{
    $stmt = $conn->prepare("SELECT * FROM Matcha.Users WHERE id=:id");
    $stmt->execute(['id' => $_SESSION['uid']]);
    $result=$stmt->fetch();
    if (hash('whirlpool',$passwd) == $result['passwd'])
    {
        $str = password_check($newpasswd, $newpasswd2);
        if ($str == "OK")
        {
            $hash = hash('whirlpool', $newpasswd);
            $replace = $conn->prepare("UPDATE Matcha.Users SET passwd=:hash WHERE id=:uid");
            $replace->execute(['hash'=> $hash, 'uid' => $_SESSION['uid']]);
            alert("Password successfully changed!", $index);
         }
         else
            alert_info($str);
    }
    else
        alert_info("Password incorrect");
    
}

?>
<html>
<head>
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

        <form class= "form" method="post" action="modif_password.php">
        <div class="reg_input">Enter password: <input type="password" name="passwd" /><br/></div>
        <div class="reg_input">Enter new password: <input type="password" name="newpasswd"/><br/></div>
        <div class="reg_input">Confirm new password: <input type="password" name="connewpasswd" /><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/> 
        <a href="account_settings.php" style="float:right" class="btn">Cancel</a>   
        <br/>        
       </form> 
