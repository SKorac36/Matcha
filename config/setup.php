<?php
include_once('database.php');
include_once('connect.php');
$db = "CREATE DATABASE IF NOT EXISTS Matcha";
$usrs = "CREATE TABLE Matcha.Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(1000) NOT NULL,
    username VARCHAR(30) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    regdate TIMESTAMP 
    )";
// $pics = "CREATE TABLE Camagru.Pics (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     userid VARCHAR(30) NOT NULL,
//     picname VARCHAR(100) NOT NULL,
//     moddate TIMESTAMP,
//     likes INT(255) DEFAULT 0
//     )";
// $comments = "CREATE TABLE Camagru.Comments (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     ownerid INT(6) NOT NULL,
//     commenterid INT(6) NOT NULL,
//     comm VARCHAR(1000),
//     img_id INT(6) NOT NULL,
//     time TIMESTAMP)";
 $profile = "CREATE TABLE Matcha.Profiles (
     id INT(6) PRIMARY KEY NOT NULL,
     age INT(3) NOT NULL,
    gender VARCHAR(1000) NOT NULL,
    preference VARCHAR(1000) DEFAULT 'bisexual',
    bio VARCHAR(2000) DEFAULT 'Enter you bio here, you can even use tags to describe yourself. Just prefix them with a hashtag.'
     )";
$conn->query($db);
// $conn->query($usrs);
 $conn->query($profile);
// $conn->query($comments);
// $conn->query($likes);
echo "<script type='text/javascript'>
	alert('Successfully created database');
	window.location.href = '../index.php'; 
	</script>";
	die();
?>