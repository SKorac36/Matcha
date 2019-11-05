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
    $matches = preg_split("/[\s,]+/", $input);
    return ($matches);
}
function unique_likes($liker, $likee, $conn)
{
    $query = "SELECT * FROM Matcha.Likes WHERE liker=? AND likee=?";
    $sql = $conn->prepare($query);
    $sql->execute([$liker, $likee]);
    $like = $sql->fetch();
    if (($like))
        return false;
    else
        return true;
}
function view($viewer, $viewee, $conn)
{
    if ($viewer != $viewee)
    {
        $query = "UPDATE Matcha.Profiles SET views=views+1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$viewee]);
        $updated_fr = fame_rating($viewee, $conn);
        $query = "UPDATE Matcha.Profiles SET fame_rating=? WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$updated_fr, $viewee]);
        $query = "INSERT INTO Matcha.Views(viewer, viewee) VALUES(?,?)";
        $sql= $conn->prepare($query);
        $sql->execute([$viewer, $viewee]);

    }
}
function like($liker, $likee, $conn)
{
    if (unique_likes($liker, $likee, $conn) == true)
    {
        $query = "UPDATE Matcha.Profiles SET likes=likes+1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$likee]);
        $query = "INSERT INTO Matcha.Likes(liker,likee) VALUES(?,?)";
        $sql = $conn->prepare($query);
        $sql->execute([$liker, $likee]);
        $updated_fr = fame_rating($likee, $conn);
        $query = "UPDATE Matcha.Profiles SET fame_rating=? WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$updated_fr, $likee]);

    }
    else
        alert("You have already liked them", "profile.php?id=".$likee);
}
function unlike($liker, $likee, $conn)
{
            $query = "DELETE FROM Matcha.Likes WHERE liker=? AND likee=?";
            $sql = $conn->prepare($query);
            $sql->execute([$liker, $likee]);
            $query = "UPDATE Matcha.Profiles SET likes=likes-1 WHERE id=?";
            $sql = $conn->prepare($query);
            $sql->execute([$likee]);
            $updated_fr = fame_rating($likee, $conn);
            $query = "UPDATE Matcha.Profiles SET fame_rating=? WHERE id=?";
            $sql = $conn->prepare($query);
            $sql->execute([$updated_fr, $likee]);
            alert("User unliked", "profile.php?id=".$likee);
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

function suggestions($pref, $gender, $latitude, $longitude, $tags, $age, $conn, $fr, $option, $age_gap, $dis_gap, $com_gap, $fr_gap)
{
    $location = 0;
    $compat = 0;
    $age = (int)$age;
    if ($option == 'Location')
    {   
        $location = 1;
        $option = 'id';
    }
    if ($option == 'Tags')
    {
        $compat = 1;
        $option = 'id';
    }
    if ($option == 'Fame Rating')
        $option = 'fame_rating';
    if ($pref == 'Straight')
    {
        if ($gender == 'Male')
        {
    
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND (Preference=? OR Preference=?) ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Female', 'Straight', 'Bisexual']);
            $users = $sql->fetchAll();
   
        }
        else if ($gender == 'Female')
        {
    
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND (Preference=? OR Preference=?) ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Straight', 'Bisexual']);
            $users = $sql->fetchAll();
    
        }
    }
    if ($pref == 'Gay')
    {   
        if ($gender == 'Male')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND (Preference=? OR Preference=?) ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Gay', 'Bisexual']);
            $users = $sql->fetchAll();
    
        }
        else if ($gender == 'Female')
        {
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? AND (Preference=? OR Preference=?) ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Female','Gay', 'Bisexual']);
            $users = $sql->fetchAll();
    
        }
    }
    if ($pref == 'Bisexual')
    {
        if ($gender == 'Male')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? OR Gender=? AND Preference=? OR Preference=? OR Preference=? ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Female','Straight', 'Gay','Bisexual']);
            $users = $sql->fetchAll();
    
        }
        
        else if ($gender == 'Female')
        {   
            $query = "SELECT * FROM Matcha.Profiles WHERE Gender=? OR Gender=? AND Preference=? OR Preference=? OR Preference=? ORDER BY $option";
            $sql = $conn->prepare($query);
            $sql->execute(['Male','Female','Straight', 'Gay','Bisexual']);
            $users = $sql->fetchAll();
    
        }
    }
//    var_dump($users);
    $new_users = [];
    foreach($users as $person)
    {
        $distance = round(getDistance($latitude, $longitude, $person['latitude'], $person['longitude']));
        $compatibility = compareTags($tags, unserialize($person['tags']));
        $fame_rating = $person['fame_rating'];
        $user_id = $person['id'];
        $p_age = (int)($person['age']);
////        var_dump($p_age);
//        var_dump($age_gap);
        if (($user_id != $_SESSION['uid']) && ($distance <= $dis_gap && $compatibility >= $com_gap) && ($fame_rating <= $fr + $fr_gap && $fame_rating >= $fr - $fr_gap) && ($p_age <= ($age + $age_gap)) && ($p_age >= ($age - $age_gap)))
            {
                $person['distance'] = $distance;
                $person['compatibility'] = $compatibility;
                $person['fame_rating'] = $fame_rating;
                array_push($new_users, $person);
            }
    }
    if ($option == 'fame_rating')
        usort($new_users, 'sortFR');
    if ($location == 1)
        usort($new_users, 'sortCmp');
    if ($compat == 1)
        usort($new_users, 'sortCmp1');
//    var_dump($new_users);
    return ($new_users);
}
function sortFR($a, $b)
{
    if ($a['fame_rating'] == $b['fame_rating'])
        return 0;
    return($a['fame_rating'] > $b['fame_rating'] ? -1 : 1);
}
function sortCmp($a, $b)
{
    if ($a['distance'] == $b['distance'])
        return 0;
    return($a['distance'] < $b['distance'] ? -1 : 1);
}
function sortCmp1($a, $b)
{
    if ($a['compatibility'] == $b['compatibility'])
        return 0;
    return($a['compatibility'] > $b['compatibility'] ? -1 : 1);
}

function getDistance($latitude1, $longitude1, $latitude2, $longitude2 ) 
{  
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
function fameRating($likes, $views)
{
    return ($likes + ($views * 0.5));

}

function picCheck($user, $conn)
{
    $query = "SELECT profile_pic FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$user]);
    $pic = $sql->fetch();
    if (isset($pic['profile_pic']))
        if($pic['profile_pic'] == 'stock.png')
            return false;
        else
            return true;
}

function compareTags($user1, $user2)
{
    return count(array_intersect($user1, $user2));

}

function goOnline($user, $conn)
{
    $query = "SELECT * FROM Matcha.Online WHERE userid=?";
    $sql = $conn->prepare($query);
    $sql->execute([$user]);
    $online = $sql->fetch();
    if ($online)
        $query = "UPDATE Matcha.Online SET online=1 WHERE userid=?";
    else
        $query = "INSERT INTO Matcha.Online(userid,online) VALUES(?,1)";
    $sql = $conn->prepare($query);
    $sql->execute([$user]);
        
}

function goOffline($user, $conn)
{

    $query = "UPDATE Matcha.Online SET online=0 WHERE userid=?";
    $sql = $conn->prepare($query);
    $sql->execute([$user]);
    $query = "UPDATE Matcha.Online SET last_online=? WHERE userid=?";
    $sql = $conn->prepare($query);
    var_dump(date("jS F Y", strtotime("now")));
    $sql->execute([date("jS F Y", strtotime("now")), $user]);

}
?>