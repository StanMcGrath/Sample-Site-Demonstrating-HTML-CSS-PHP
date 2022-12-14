<?php
//Create database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "G00398383";

$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
//Takes username and password of the user, inserts this record into the database so user info is stored.
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "INSERT INTO users (username, password) VALUES ('{$uname}', '{$password}')";
$result = mysqli_query($connection,$sql);

mysqli_close($connection);