<?php


require_once('header.php');
check_logged_in();
check_profile($_SESSION['uid'], $conn);


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
                echo '<p>'.$like['username'].' liked you!</p>';
        }
        else
            echo '<p> Nobody has liked you recently :( </p>'
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
        echo '<p>'.$view['username'].' viewed you!</p>';
    }
    else
        echo '<p>Nobody has viewed you recently :( </p>'
?>
    </div>
</div>
<?php
    require_once("footer.php");
?>
</html>
