<?php
    require_once('header.php');

    $query = "SELECT * FROM Matcha.Users WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $user = $sql->fetch();
    $old_first = $user['first_name'];
    $old_last = $user['last_name'];
    $old_email = $user['email'];

    if (isset($_POST['submit']))
    {
        if (hash('whirlpool',$_POST['password']) == $user['passwd'])
        {
            if (!empty($_POST['first']))
                $old_first = $_POST['first'];
            if (!empty($_POST['last']))
                $old_last = $_POST['last'];
            if (!empty($_POST['email']))
                $old_email = $_POST['email'];
            $query = "UPDATE Matcha.Users SET first_name=?, last_name=?, email=? WHERE id=?";
            $sql = $conn->prepare($query);
            $sql->execute([$old_first, $old_last, $old_email, $_SESSION['uid']]);
            alert_info("Changes made");
        }
        else
            alert_info("Password incorrect");
    }
    

?>
<html>
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
        <form class= "form" method="post" action="user_settings.php" align="center">
        <div class="reg_input">New name<input type="text" name="first"></div>
        <div class="reg_input">New last name<input type="text" name="last"></div>
        <div class="reg_input">Email<input type="email" name="email"></div>
        <div class="reg_input">Password<input type="password" name="password"></div>
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
<?php
    include('footer.php');
?>
</html>