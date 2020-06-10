<?php
require_once('header.php');



var_dump($_SESSION);
if (isset($_POST['full_name'])){
    $full_name = explode(" ", trim(htmlentities($_POST['full_name'])));
    if (sizeof($full_name) != 2)
        {
            alert("Your full name can only be two words", "modif_birth_name.php");
        }
    $name = trim($full_name[0]);
    $surname = trim($full_name[1]);
    var_dump($name." ".$surname);
    
}
if (isset($_POST['passwd']))
    $password = htmlentities($_POST['passwd']);

if (isset($_POST['submit']) && !empty($name) && !empty($password) && !empty($surname))
{
    if (check_passwd($_SESSION['name'], $password, $conn) == "OK")
        {
            $replace = $conn->prepare("UPDATE Matcha.Users SET last_name=:surname, first_name=:first_name WHERE username=:uname");
            $replace->execute(['surname'=> $surname, 'first_name'=>$name,'uname'=> $_SESSION['name']]);
            alert("Name succesfully changed", $index);
           
        }
        else
            alert_info("Password incorrect");
}
?>
<html>
<head>
    <title>Change full name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

        <form class= "form" method="post" action="modif_birth_name.php">
        <div class="reg_input">Enter new full name: <input type="text" name="full_name"/><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd" /><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        <a href="settings.php" style="float:right" class="btn">Cancel</a>   
       <br/>        
       </form> 
       <?php
    include('footer.php');
?>