<?php

require_once('functions.php');
require_once('config/connect.php');
if (isset($_GET['id1']) && isset($_GET['id2']))
{
    $liker = $_GET['id1'];
    $likee = $_GET['id2'];
    like($likee, $liker, $conn);
}

?>