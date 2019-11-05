<?php
    require_once('config/connect.php');
    require_once('email_functions.php');
    require_once('functions.php');

    if (isset($_GET['id']) && (isset($_GET['reset']))) 
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM Matcha.users WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->execute(['id'=> $id]);
        $user = $stmt->fetch();
        $username = $user['username'];
        $email = $user['email'];
        if (!$id)
            alert_info("User not found, unable to reset");
        else if ($_GET['reset'] == 'true')
        {
            $re = hash('whirlpool', uniqid());
            $new = substr($re, 0, 5);
            $hash = hash('whirlpool', $new);
            $query = "UPDATE Matcha.users SET passwd=:new WHERE id=:uid";
            $stmt = $conn->prepare($query);
            $stmt->execute(['new'=>$hash, 'uid'=>$id]);
            password_reset_email($email, $new);
            alert("You have successfully reset your password, check your email",'header.php');
        }
    }
?>