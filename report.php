<?php
    
    require_once('config/connect.php');
    if(isset($_GET['id1']) && isset($_GET['id2']))
    {
        $reporter = $_GET['id1'];
        $reportee = $_GET['id2'];

        $query = "UPDATE Matcha.Profiles SET reports=reports-1  WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$reportee]);
        $query = "SELECT * FROM Matcha.Profile WHERE id=?";
        $sql = $conn->prepare($query);
        $user = $sql->fetch();
        $reports = $user['reports'];
        if ($reports == 5)
        {
            echo hello;
            //Send notification to reportee
            //"Good day, we have received multiple reports on your account. If continued yor behaviour will cause us to ulitmately delete your account. 
            //Please respect the other users on our platform" 
        }
        // 1 Decrement reports in the Matcha.profiles, Reports start at 10
        // 2 Send notification
        // 3 Ask if they would like to block them
        // 4 If user has 5 reports, they get a notifcation that their profile has been reported excessivley
        // 5 If user has 0 reports, they get their account deleted
    }

?>