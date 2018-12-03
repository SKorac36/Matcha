<?php
require_once("header.php");
if (isset($_SESSION) && !empty($_SESSION['uid']))
{   
    session_destroy();
    alert("Succesfully logged out", $index);
}
else
    alert("You need to be logged in to be logged out", $index);
die();
?>