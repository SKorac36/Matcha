<?php
 
 require_once('./config/connect.php');
 require_once('functions.php'); 
 
 if(isset($_GET['id1']) && isset($_GET['id2']))
 {
        $blocker = (int)$_GET['id1'];
        $blockee = (int)$_GET['id2'];
        $query = "INSERT INTO Matcha.blocks (blocker,blockee) VALUES (?,?)";
        $sql = $conn->prepare($query);
        $sql->execute([$blocker, $blockee]);
        alert("You have successfully blocked the pest, they will be unable to see your profile", "index.php");
 }
?>