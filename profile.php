<?php
    require_once('header.php');
    if (isset($_SESSION) && isset($_SESSION['uid']))
    {
        if (isset($_GET['id']))
            $uid = $_GET['id'];
        view($_SESSION['uid'], $uid, $conn);
        $query = "SELECT * FROM Matcha.Profiles JOIN Matcha.users ON Matcha.profiles.id=Matcha.users.id WHERE Matcha.profiles.id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $profile = $sql->fetch();
        $first_name = $profile['first_name'];
        $last_name = $profile['last_name'];
        $bio = $profile['bio'];
        $age = $profile['age'];
        $path = $profile['profile_pic'];
        $tags = array_unique(unserialize($profile['tags']));
        $username = $profile['username'];

        $query = "SELECT * FROM Matcha.Images WHERE userid=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $images = $sql->fetchAll();
        
        $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$_SESSION['uid']]);
        $user = $sql->fetch();
        $lat_me = $user['latitude'];
        $long_me = $user['longitude'];
        
        $query  = "SELECT * FROM Matcha.Profiles WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $user = $sql->fetch();
        $fame_rating = fameRating($user['likes'], $user['views']);
        $lat_you = $user['latitude'];
        $long_you = $user['longitude'];
        $distance = round(getDistance($lat_me, $long_me, $lat_you, $long_you));

        $query = "SELECT * FROM Matcha.Online WHERE userid=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $user = $sql->fetch();
        $online = $user['online'];
        $time = $user['last_online'];

        $query = "SELECT * FROM Matcha.Likes WHERE likee=? AND liker=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid, $_SESSION['uid']]);
        $user = $sql->fetch();
        if ($user)
            $liked = 1;
        else
            $liked = 0;
    }

?>
<html>
<div class="container-fluid w3-light-grey">
<div align="center"><?php  
    echo '<h1>'.$username.'</h1><br>';
    echo '<p>Last online: </p>';
    if ($online == 1)
        echo '<p>Now!</p><br>';
    else
        echo '<p>'.date('l jS \of F Y h:i:s A',$time).'</p>';
    if ($liked == 1)
        echo '<p>You have liked them!</p>';
    echo '<img src="'.$path.'"</img><br><br>';
    echo '<p>'.$first_name.' '.$last_name.'<br>'.$age.'<br>'.$distance.' kms away<br><p id="bio">'.$bio.'</p><br>Fame rating:'.$fame_rating.'</p> <br>Tags:<br><br>';
    
    foreach ($tags as $tag)
    {
        echo ''.strtoupper($tag).' '.'';
    }
    echo '<br>';
    if ($_SESSION['uid'] != $_GET['id'])
    {
        echo '<a href="like.php?id1='.$_SESSION['uid'].'&id2='.$_GET['id'].'"class="w3-bar-item w3-button">Like</a>';
        echo '<br><a href="report.php?id1='.$_SESSION['uid'].'&id2='.$_GET['id'].'"class="w3-bar-item w3-button">Report</a>
        <a href="block.php?id1='.$_SESSION['uid'].'&id2='.$_GET['id'].'"class="w3-bar-item w3-button">Block</a>';
        if ($liked == 1)
            echo '<a href="unlike.php?id1='.$_SESSION['uid'].'&id2='.$_GET['id'].'"class="w3-bar-item w3-button">Unlike</a>';
    }
  ?>
  </div>
   <div class="items" align="right">
        <table padding="15px">
                <?php
                if (!$images || $_SESSION['uid'] != $uid)
                    echo "<h2></h2>";
                else {
                    echo '<p>Choose a profile picture</p>';
                    if (!$images)
                        echo '<p>No pictures found, upload some</p>';
                    else{
                        foreach($images as $row) {
                            $img_loc = $row['path'];
                            $img_id = $row['id'];
                            if (file_exists($img_loc) && $_SESSION['uid'] == $uid)
                                echo '<tr<td><a href="image.php?img_id=' . $img_id . '"><img src="' . $img_loc . '" height="100" width="90"/></a></td></tr>';
                        }
                    }
                }
                ?>
        </table>
</div>
<?php
    include('footer.php');
?>
</html>
