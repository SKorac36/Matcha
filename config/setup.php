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
     id INT(6) PRIMARY KEY NOT NULL,
     age INT(3) NOT NULL,
    gender VARCHAR(1000) NOT NULL,
    preference VARCHAR(1000) DEFAULT 'bisexual',
    bio VARCHAR(1000),
    tags VARCHAR(1000),
    latitude TEXT NOT NULL,
    longitude TEXT NOT NULL,
    views INT(255) DEFAULT 0,
    likes INT(255) DEFAULT 0,
    regdate TIMESTAMP
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
$conn->query($db);
$conn->query($usrs);
$conn->query($profile);
$conn->query($images);
$conn->query($tags);
echo "<script type='text/javascript'>
	alert('Successfully created database');
	window.location.href = '../index.php'; 
	</script>";
	die();
?>