<?php
require_once('./config/connect.php');
function password_check($pass, $conpass)
{
    if ($pass != $conpass)
        return "Passwords do not match";
    if (strlen($pass) <= 6)
        return "Password needs to be longer than 6 characters, must contain at least one special character, one upper and lower case letter and at least one digit";
    if (!preg_match('/[^a-zA-Z\d]/', $pass)) 
        return "Password needs to be longer than 6 characters, must contain at least one special character, one upper and lower case letter and at least one digit";
    if (!preg_match('/[a-zA-Z]/', $pass)) 
        return "Password needs to be longer than 6 characters, must contain at least one special character, one upper and lower case letter and at least one digit";
    if (!preg_match('/\d/', $pass)) 
        return "Password needs to be longer than 6 characters, must contain at least one special character, one upper and lower case letter and at least one digit";
    return "OK";
}
function    alert_info($str)
{
    echo "<script type='text/javascript'>alert('$str')</script>";
}
function alert($str, $redirect)
{
	echo "<script type='text/javascript'>
	alert('$str');
	window.location.href = '$redirect'; 
	</script>";
	die();
}

function get_tags($input)
{
    // $matches = array();
    preg_match_all("/(#\w+)/", $input, $matches);
    return ($matches[0]);
}

function view($viewer, $viewee, $conn)
{
    if ($viewer != $viewee)
    {
        $query = "UPDATE Matcha.Profiles SET views=views+1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$viewee]);
        //send notifcation
    }
}

function like($liker, $likee, $conn)
{
    if ($likee != $likee)
    {
        $query = "UPDATE Matcha.Profiles SET likes=likes+1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$likee]);
        //send notification
    }
}
?>