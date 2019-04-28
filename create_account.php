<?php
    require_once('header.php');

    if (empty($_SESSION))
    {
        if (isset($_POST['submit']))
        {
            if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['first']) || empty($_POST['last']) || empty($_POST['passwd']) || empty($_POST['conpasswd']))
                alert_info("One or more fields left empty");
            else
            {
                $str = password_check($_POST['passwd'], $_POST['conpasswd']);
                if ($str != "OK")
                    alert_info($str);
                else
                {
                    foreach($_POST as &$html)
                        $html = htmlentities($html); 
                    $hash = hash('whirlpool', $html['passwd']);
                    $query = "INSERT INTO Matcha.Users(email, username,passwd,last_name, first_name) VALUES(?,?,?,?,?)";
                    $sql = $conn->prepare($query);
                    $sql->execute(($html['email']), ($html['username']), $hash, ($html['last']), ($html['first']));
                    // $query = "INSERT INTO Matcha.Searches";
                    // $sql = $conn->prepare($query);
                    // $sql->execute();
                    alert("Successfully created account, please login", "login.php");
                }
            }      
        }
    }
    else
        header("location: " . "index.php");

?>
<html>
<head>
    <title>Create new user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel= "stylesheet" href="stylesheet.css">
</head>
<div id="main">
        <form class="form" method="post" action="create_account.php" align="center">
        <div class="reg_input">Enter email: <input type="email" name="email"/><br/></div>
        <div class="reg_input">Username: <input type="text" name="username"/><br/></div>
        <div class="reg_input">First name: <input type="text" name="first"/><br/></div>
        <div class="reg_input">Last name: <input type="text" name="last"/><br/></div>
        <div class="reg_input">Enter password: <input type="password" name="passwd"/><br/></div>
        <div class="reg_input">Confirm password: <input type="password" name="conpasswd"/><br/></div>
        <input type="submit" class="btn" name="submit" value="OK"/> 
         <a href="login.php">Already a user?</a>
</form>
</div>
<?php
    include('footer.php');
?>
</html>