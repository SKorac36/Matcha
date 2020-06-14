<?php
require_once("header.php");

check_logged_in();
goOffline($_SESSION['uid'], $conn);
session_destroy();
alert("Succesfully logged out", $index);
die();
?>