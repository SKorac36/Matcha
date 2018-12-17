<?php

    require_once('config/connect.php');
    session_start();
    if(isset($_GET['img_id']))
    {
        
        $query = "SELECT * FROM Matcha.Images WHERE id=?";
        $sql=$conn->prepare($query);
        $sql->execute([$_GET['img_id']]);
        $img = $sql->fetch();
        $path = $img['path'];
        $query = "UPDATE Matcha.Profiles SET profile_pic=?";
        $sql = $conn->prepare($query);
        $sql->execute([$path]);
        echo "<script type='text/javascript'>
	    alert('Profile picture updates');
	    window.location.href = 'profile.php?=profile_id=".$_SESSION['uid']."'; 
	    </script>";
	    die();
    }
?>