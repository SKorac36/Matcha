<?php

require_once('functions.php');
require_once('config/connect.php');
if (isset($_GET['id1']) && isset($_GET['id2']))
{
    $liker = (int)$_GET['id1'];
    $likee = (int)$_GET['id2'];
    like($liker, $likee, $conn);
    alert('Nice you like them', 'profile.php?id='.$likee);
}

?>