<?php

require_once('header.php');


if (isset($_SESSION) && !empty($_SESSION['uid']))
{
    $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $user = $sql->fetch();
    $pref = $user['preference'];
    $gender = $user['gender'];
    $latitude = $user['latitude'];
    $longitude = $user['longitude'];
    $fr = $user['fame_rating'];
//    var_dump($user['tags']);
    $tags = unserialize($user['tags']);
//    var_dump($user['tags']);
    $age = $user['age'];
    $query = "SELECT * FROM Matcha.Searches WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $search = $sql->fetch();

$option = 'id';
if (isset($_POST['option']))
        $option = $_POST['option'];
$age_gap = $search['age_gap'];
$dis_gap = $search['distance'];
$com_gap = $search['com_gap'];
$fr_gap = $search['fame_rating'];
//var_dump($tags);
$matches = suggestions($pref, $gender,$latitude,$longitude, $tags, $age,$conn, $fr, $option, $age_gap ,$dis_gap, $com_gap, $fr_gap);
}
else
    header("location: " . "create_account.php");
?><div id="main">
<form class="form" action="browse_profiles.php" method="post">
    Sort by <br>
  <input type="submit" class="btn" name="option" value="Age" /> 
  <input type="submit" class="btn" name="option" value="Location" /> 
  <input type="submit" class="btn" name="option" value="Fame Rating"/> 
  <input type="submit" class="btn" name="option" value="Tags"/>
  
</form>
  <table>
                <?php
            
                if (!$matches)
                {
                    echo "<h1>Whoops nothing here, no one here. Try changing your search parameters.</h1>";
                }
                else foreach($matches as $row)
                {
                    $pic = $row['profile_pic'];
                    $id = $row['id'];
                    if ($matches)
                    {
                        if (!(checkBlocks($conn, $_SESSION['uid'], $id)))
                            echo '<tr<td><a href="profile.php?id='.$id.'"><img src="'.$pic.'"hspace="20"/></a></td></tr>';
                    }
                }
                
                ?>
        </table>
        </div>
        
        <?php
        include_once('footer.php');
        ?>
