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
$matches = matching($pref, $gender, $conn);

?>
  <table padding="15px">
                <?php
                if (!$matches)
                    echo "<h1>Whoops nothing here, no one here</h1>";
                else foreach($matches as $row)
                {
                    $pic = $row['profile_pic'];
                    $id = $row['id'];
                    if (($matches))
                        echo '<tr<td><a href="profile.php?id='.$id.'"><img src="'.$pic.'" height="300" width="400"/></a></td></tr>';
                }
                ?>
        </table>
