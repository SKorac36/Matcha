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
    if ($liker != $likee)
    {
        $query = "UPDATE Matcha.Profiles SET likes=likes+1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$likee]);
        $query = "INSERT INTO Matcha.Likes(liker,likee) VALUES(?,?)";
        $sql = $conn->prepare($query);
        $sql->execute([$liker, $likee]);

        //send notification
    }
}
function fame_rating($user, $conn)
{
    $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$user]);
    $user = $sql->fetch();
    $return = ($user['likes'] + ($user['views'] * 0.5));
    return $return;

}
function matching($pref, $gender, $conn)
{
    
    
    
    if ($pref == 'Straight')
    {
        if ($gender == 'Male')
        {
            // echo "Display straight and bisexual women";

            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Female', 'Straight', 'Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
        else if ($gender == 'Female')
        {
        // echo "Display straight and bisexual men";
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Straight', 'Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
    }
    if ($pref == 'Gay')
    {   
        if ($gender == 'Male')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Gay', 'Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
        else if ($gender == 'Female')
        {
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Female','Gay', 'Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
    }
    if ($pref == 'Bisexual')
    {
        if ($gender == 'Male')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? OR Gender=? AND Preference=? OR Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Female','Straight', 'Gay','Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
        
        else if ($gender == 'Female')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? OR Gender=? AND Preference=? OR Preference=? OR Preference=?";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Female','Straight', 'Gay','Bisexual']);
            $users = $sql->fetchAll();
            return $users;
        }
    }
}

function getDistance($latitude1, $longitude1, $latitude2, $longitude2 ) {  
    $earth_radius = 6371;

    $dLat = deg2rad( $latitude2 - $latitude1 );  
    $dLon = deg2rad( $longitude2 - $longitude1 );  

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  
    $d = $earth_radius * $c;  

    return $d;  
}
function getBlocks($conn, $id)
{
    $query = "SELECT blockee FROM Matcha.Blocks WHERE blocker=?";
    $sql = $conn->prepare($query);
    $sql->execute([$id]);
    $list = $sql->fetchAll(PDO::FETCH_COLUMN, 0); 
    return $list; 
}
function checkBlocks($conn, $viewer, $viewee)
{
    $query = "SELECT * FROM Matcha.Blocks WHERE blocker=? AND blockee=?";
    $sql = $conn->prepare($query);
    $sql->execute([$viewer, $viewee]);
    $block = $sql->fetch();
    // var_dump($block);
    if ($block)
        return true;
     else
        return false;
}
?>