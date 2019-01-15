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
}
$option = 'id';
if (isset($_POST['submit']))
{ 
    // var_dump($_POST);

    if (isset($_POST['option']))
        $option = $_POST['option'];
    var_dump($_POST['submit']);
}
// $blocks = getBlocks($conn, $_SESSION['uid']);
$matches = matching($pref, $gender, $conn, $option);
// var_dump($blocks);
var_dump($_POST['submit']);
?>
<form class="form" action="browse_profiles.php" method="post">
  <input type="radio" name="option" value="age" /> Age
  <input type="radio" name="option" value="location" /> Location
  <input type="radio" name="option" value="fame_rating" /> Fame Rating<br>
  <input type="submit" class="btn" name="submit" value="OK"/>
  
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
                            echo '<tr<td><a href="profile.php?id='.$id.'"><img src="'.$pic.'" height="300" width="400" hspace="20"/></a></td></tr>';
                    }
                }
                ?>
        </table>