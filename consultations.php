<?php


require_once('header.php');


$query = "SELECT * FROM Matcha.Likes JOIN Matcha.Users ON Matcha.Likes.liker=Matcha.users.id WHERE Matcha.Likes.likee=?";
$sql = $conn->prepare($query);
$sql->execute([$_SESSION['uid']]);
$likes = $sql->fetchAll();
if ($likes){
    foreach($likes as $like)
    {
        echo '<p>'.$like['username'].' liked you at '.$like['time'].'</p>';
    }
}

$query = "SELECT * FROM Matcha.Views JOIN Matcha.Users ON Matcha.Views.viewer=Matcha.users.id WHERE Matcha.views.viewee=?";
$sql = $conn->prepare($query);
$sql->execute([$_SESSION['uid']]);
$likes = $sql->fetchAll();
if ($likes){
    foreach($likes as $like)
    {
        echo '<p>'.$like['username'].' viewed you at '.$like['time'].'</p>';
    }
}
?>
