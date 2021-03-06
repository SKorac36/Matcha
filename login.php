<?php
require_once('header.php');


if (isset($_POST['submit']))
{      
    $_POST['username'] = htmlentities($_POST['username']);
    $_POST['passwd'] = htmlentities($_POST['passwd']);
    if (empty($_POST['username']) || empty($_POST['passwd']))
        alert_info("One or more fields left empty");
    else
    {
        $user = find_username($_POST['username'], $conn);
        $hash = hash('whirlpool', $_POST['passwd']);
        if ($user)
        {
            if ($user['passwd'] != $hash)
                alert_info('Password incorrect, try again');
            else if ($user['passwd'] == $hash)
            {
                $_SESSION['uid'] = $user['id'];
                $_SESSION['name'] = $user['username'];
                goOnline($_SESSION['uid'], $conn);
                check_verified($_POST['username'], $conn);
                $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
                $sql = $conn->prepare($query);
                $sql->execute([$_SESSION['uid']]);
                $user= $sql->fetch();
                if (!$user)
                    alert('Welcome to Matcha, '.$_SESSION['name'].' ','user_setup.php');
                else 
                    alert('Welcome to Matcha, '.$_SESSION['name'].' ','index.php');
            }
        }
        else
            alert_info('Username not found');
    }
}
if (isset($_POST['reset']))
{
        if (empty($_POST['username']) || !isset($_POST['username']))
            alert("At least enter your username, pleb","login.php");
        else if (isset($_POST['username']))
        {
            $user = find_username($_POST['username'], $conn);
            if (!$user)
                alert_info("Username not found");
            else {
                alert_info("Check your email");
                reset_password_email($user['email'], $user['username'], $user['id']);
            }
        }
}


?>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head><div id="main">
        <form class= "form" method="post" action="login.php" align="center">
        <div class="reg_input">Username: <input type="text" name="username"/><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd"/><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        <input type="submit" class="btn" name="reset" value="Forgotten Password"/><br>
</div>
</form>
<?php
    include('footer.php');
?>
</html>