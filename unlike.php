<?php

require_once('functions.php');
require_once('config/connect.php');
if (isset($_GET['id1']) && isset($_GET['id2']))
{
    $liker = (int)$_GET['id1'];
    $likee = (int)$_GET['id2'];
    unlike($liker, $likee, $conn);
}

?>