<?php
    
    require_once('config/connect.php');
    require_once('functions.php');
    if(isset($_GET['id1']) && isset($_GET['id2']))
    {
        $reporter = $_GET['id1'];
        $reportee = $_GET['id2'];

        $query = "UPDATE Matcha.Profiles SET reports=reports-1  WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$reportee]);
        alert('You have reported them, if you would like to block them select the block option on their profile', "browse_profiles.php");
    }

?>