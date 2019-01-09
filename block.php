<?php
 
 require_once('./config/connect.php');
 
 if(isset($_GET['id1']) && isset($_GET['id2']))
 {
        $blocker = $_GET['id1'];
        $blockee = $_GET['id2'];
        $query = "INSERT INTO Matcha.Blocks SET blocker=? AND blockee=?";
        $sql = $conn->query($query);
        $sql->execute([$blocker, $blockee]);
        alert("You have successfully blocked the pest, they will be unable to see your profile", "index.php");
 }
?>