<?php


require_once('header.php');

?><html>
<link rel="stylesheet" href="stylesheet.css">
<div id="main">
    <div style="form">
    <?php
        $query = "SELECT * FROM Matcha.Likes JOIN Matcha.Users ON Matcha.Likes.liker=Matcha.users.id WHERE Matcha.Likes.likee=?";
        $sql = $conn->prepare($query);
        $sql->execute([$_SESSION['uid']]);
        $likes = $sql->fetchAll();
        if ($likes){
            foreach($likes as $like)   
                echo '<p>'.$like['username'].' liked you at '.$like['time'].'</p>';
        }
?>
</div>
    <div style="form">
    <?php
        $query = "SELECT * FROM Matcha.Views JOIN Matcha.Users ON Matcha.Views.viewer=Matcha.users.id WHERE Matcha.views.viewee=?";
        $sql = $conn->prepare($query);
        $sql->execute([$_SESSION['uid']]);
        $views = $sql->fetchAll();
    if ($views){
    foreach($views as $view)
        echo '<p>'.$view['username'].' viewed you at '.$view['time'].'</p>';
    }
?>
    </div>
</div>
<?php
    require_once("footer.php");
?>
</html>
