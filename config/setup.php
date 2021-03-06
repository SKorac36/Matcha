<?php
include_once('database.php');
include_once('connect.php');
$delete = "DROP DATABASE IF EXISTS Matcha";
$db = "CREATE DATABASE IF NOT EXISTS Matcha";
$usrs = "CREATE TABLE IF NOT EXISTS Matcha.Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(1000) NOT NULL,
    username VARCHAR(30) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    regdate TIMESTAMP,
    code VARCHAR(255),
    verified INT(1) DEFAULT 0
    )";
 $profile = "CREATE TABLE IF NOT EXISTS Matcha.Profiles (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     age INT(3) NOT NULL DEFAULT 0,
    gender VARCHAR(1000) NOT NULL,
    preference VARCHAR(1000) DEFAULT 'Bisexual',
    bio VARCHAR(1000),
    tags VARCHAR(1000) DEFAULT 'Empty',
    latitude Decimal(9,6),
    longitude Decimal(9,6),
    views INT(255) DEFAULT 0,
    likes INT(255) DEFAULT 0,
    profile_pic VARCHAR(1000) DEFAULT 'stock.png', 
    reports INT(10) DEFAULT 10,
    fame_rating INT(255) DEFAULT 0
     )";
$images = "CREATE TABLE IF NOT EXISTS Matcha.Images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) NOT NULL,
    path VARCHAR(1000) NOT NULL,
    profile INT (1) DEFAULT 0
    )";

$likes = "CREATE TABLE IF NOT EXISTS Matcha.Likes(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    likee INT(6) NOT NULL,
    liker INT(6) NOT NULL
)";
$blocks = "CREATE TABLE IF NOT EXISTS Matcha.Blocks(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blocker INT(6) NOT NULL,
    blockee INT(6) NOT NULL)";
$online = "CREATE TABLE IF NOT EXISTS Matcha.Online(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) NOT NULL,
    online INT(2) NOT NULL DEFAULT 0,
    last_online INT(255))";
$views = "CREATE TABLE IF NOT EXISTS Matcha.Views(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    viewer INT(3) NOT NULL,
    viewee INT(3) NOT NULL
)";
$search = "CREATE TABLE IF NOT EXISTS Matcha.Searches(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    age_gap INT(3) NOT NULL DEFAULT 10,
    distance INT(3) NOT NULL DEFAULT 10,
    fame_rating INT(3) NOT NULL DEFAULT 10,
    com_gap INT(1) NOT NULL DEFAULT 2
)";

$conn->query($delete);
$conn->query($db);
$conn->query($usrs);
$conn->query($profile);
$conn->query($images);
$conn->query($likes);
$conn->query($blocks);
$conn->query($online);
$conn->query($views);
$conn->query($search);
include('prep.php');
include('new_prep.php');
echo "<script type='text/javascript'>
	alert('Successfully created database');
	window.location.href = '../index.php';
	</script>";
	die();
?>