<?php

include('header.php');

$array = ['musician', 'gamer', 'coder', 'cook', 'nerd'];
$insert = serialize($array);

$query = "UPDATE Matcha.Profiles SET tags=?";
$sql = $conn->prepare($query);
$sql->execute([$insert]);
?>