<?php
include_once('database.php');
include_once('connect.php');
$db = "CREATE DATABASE IF NOT EXISTS Matcha";
$usrs = "CREATE TABLE IF NOT EXISTS Matcha.Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(1000) NOT NULL,
    username VARCHAR(30) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    regdate TIMESTAMP 
    )";
 $profile = "CREATE TABLE IF NOT EXISTS Matcha.Profiles (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     age INT(3) NOT NULL DEFAULT 0,
    gender VARCHAR(1000) NOT NULL,
    preference VARCHAR(1000) DEFAULT 'Bisexual',
    bio VARCHAR(1000),
    -- tags VARCHAR(1000),
    latitude Decimal(9,6),
    longitude Decimal(9,6),
    views INT(255) DEFAULT 0,
    likes INT(255) DEFAULT 0,
    profile_pic VARCHAR(1000) DEFAULT 'stock.png', 
    reports INT(10) DEFAULT 10
    -- fame_rating INT(255) DEFAULT 0
     )";
$images = "CREATE TABLE IF NOT EXISTS Matcha.Images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) NOT NULL,
    path VARCHAR(1000) NOT NULL,
    profile INT (1) DEFAULT 0
    )";
$tags = "CREATE TABLE IF NOT EXISTS Matcha.Tags (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tag VARCHAR(30) NOT NULL,
    count INT(60) DEFAULT 0
    )";
$likes = "CREATE TABLE IF NOT EXISTS Matcha.Likes(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    likee INT(6) NOT NULL,
    liker INT(6) NOT NULL,
    time TIMESTAMP)"; //use for notifications
$blocks = "CREATE TABLE IF NOT EXISTS Matcha.Blocks(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blocker INT(6) NOT NULL,
    blockee INT(6) NOT NULL)";
$conn->query($db);
$conn->query($usrs);
$conn->query($profile);
$conn->query($images);
$conn->query($tags);
$conn->query($likes);
$conn->query($blocks);
 include('prep.php');
echo "<script type='text/javascript'>
	alert('Successfully created database');
	window.location.href = '../index.php'; 
	</script>";
	die();
?>