<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'loushengbo123';

//create connection

$conn = mysqli_connect($serverName,$userName,$password);

//create database share
$db = "CREATE DATABASE share";
mysqli_query($conn,$db);

if(!$conn){
  die("connection error");
}
else {
}

//select database
$db = mysqli_select_db($conn,'share');

if(!$db){
  die("db selection error");
}
else {
}




 ?>
