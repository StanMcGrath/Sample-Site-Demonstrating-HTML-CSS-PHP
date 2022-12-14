<?php

session_start();
//Create a database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "G00398383";

$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
//Logs a registered user into the site using their recorded user info from the database, to allow functionality of the shop and cart.
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "SELECT * FROM users WHERE username = '{$uname}' AND password = '{$password}'";
$result = mysqli_query($connection,$sql);

$user = false;

if ($result->num_rows > 0) {
	$user = mysqli_fetch_array($result);
	$_SESSION['user'] = $user['id'];
}

mysqli_close($connection);

die($user ? json_encode($user) : $user);