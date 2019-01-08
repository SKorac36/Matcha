<?php
 
    if(isset($_GET['id1']) && isset($_GET['id2']))
    {
        $reporter = $_GET['id1'];
        $reportee = $_GET['id2'];
        // 1 Decrement reports in the Matcha.profiles, Reports start at 10
        // 2 Send notification
        // 3 Ask if they would like to block them
        // 4 If user has 5 reports, they get a notifcation that their profile has been reported excessivley
        // 5 If user has 0 reports, they get their account deleted
    }

?>