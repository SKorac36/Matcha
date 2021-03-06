<?php

require_once('header.php');


    check_logged_in();
    $user = check_profile($_SESSION['uid'], $conn);
    $pref = $user['preference'];
    $gender = $user['gender'];
    $latitude = $user['latitude'];
    $longitude = $user['longitude'];
    $tags = unserialize($user['tags']);
    $fr = $user['fame_rating'];
    $age = $user['age'];
    $option = 'id';
    if (isset($_POST['option']))
        $option = $_POST['option'];
    $matches = suggestions($pref, $gender,$latitude,$longitude, $tags, $age,$conn, $fr,$option, 30, 100, 0, 125);
?>
<div id="main"><br>
<form class="form" action="index.php" method="post">
    Sort by <br>
  <input type="submit" class="btn" name="option" value="Age" /> 
  <input type="submit" class="btn" name="option" value="Location" /> 
  <input type="submit" class="btn" name="option" value="Fame Rating"/> 
  <input type="submit" class="btn" name="option" value="Tags"/>
  <br><br>
  <p>Suggestion params:</p>
    <p> Age: 30 </p> 
    <p> Distance: 100km </p>
    <p> Fame rating: 125  </p>
    <p>Tags: 0 </p>
</form>

  <table>
                <?php
            
                if (!$matches)
                    echo "<h1>Whoops nothing here, no one here</h1>";
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